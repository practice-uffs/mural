<template>
          <form @submit.prevent="create" class="mb-3">
            <div class="form-group my-3">
                <label for="title">Título</label>
                <input type="text" class="form-control"
                       id="title" placeholder="Exemplo: Audio para exercício da aula de Espanhol I"
                       v-model="title" required>
            </div>
            <div class="form-group my-3">
                <label for="description">Descrição</label>
                <textarea type="text" class="form-control" rows="5"
                       id="description" placeholder="Exemplo: O audio será feito a partir de um texto, onde terão diversos personagens e as falas serão gravadas separadamente e depois devem ser juntados em um audio só, seguindo o roteiro."
                       v-model="description" required>
                </textarea>
                <small><span class="helper-text text-muted">Inclua na descrição o máximo de informações descritivas possíveis
                                                            sobre a sua solicitação.</span></small>
            </div>

            <div class="form-group my-3">
                <label for="categoria">Tipo de Serviço</label>
                <select class="form-control mb-2" v-model="categoryId" required
                        @change="filterSpecification">
                    <option value="" disabled selected>Selecione um tipo de serviço</option>
                    <option
                        v-for="categoria in categorias"
                        :key="categoria.id"
                        :value="categoria.id"
                    >{{categoria.name}}</option>
                </select>
                <label for="categoria">Especificação do Serviço</label>
                <select class="form-control" v-model="specificationId" required>
                    <option value="" disabled selected>Selecione a especificação do serviço</option>

                    <option
                        v-for="specification in select_specifications"
                        v-show="specification.available"
                        :key="specification.id"
                        :value="specification.id"
                    >{{specification.title}}
                    </option>
                </select>
                <small><span class="helper-text text-muted">Em caso de dúvidas sobre os tipos de serviços do PRACTICE, consulte nosso <a href="https://practice.uffs.cc/" target="_blank">site</a>.
                </span></small>
            </div>
            <div class="form-group my-3">
                <label for="categoria">Localização</label>
                <select class="form-control" v-model="locationId" required
                >
                    <option value="" disabled selected>Selecione uma das Localidades</option>
                    <option
                        v-for="localizacao in localizacoes"
                        :key="localizacao.id"
                        :value="localizacao.id"
                    >{{localizacao.name}}</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-outline-warning d-flex align-items-center ">Enviar <span class="material-icons">send </span> </button>
            </div>
        </form>
</template>
<script>
import Auth from './../../service/Auth';
import Swal from 'sweetalert2';

const SERVICE = 2;

export default {
    props:['user','token'],
    data(){
        return {
            className:'',
            categorias:null,
            localizacoes:null,
            specifications:null,
            select_specifications:null,

            title:'',
            description:'',
            locationId:null,
            categoryId:null,
            specificationId:null,
        }
    },
    updated(){
    },
    methods:{
        filterSpecification(){
            this.select_specifications = this.specifications.filter(function(specification){
                return specification.category_id == event.target.value;
            })
        },
        async getCategories(){
            let {data} = await window.axios.get('/api/categories',{
                params: {
                    'item_type': SERVICE,
                }
            });
            this.categorias = data
        },
        async getLocations(){
            let {data} = await window.axios.get('/api/locations');
            this.localizacoes = data;
        },
        async getSpecification(){
            let {data} = await window.axios.get('/api/specifications');
            this.specifications = data;
        },
        async create() {
            Auth.check(this.token);
            let data = {
                'user_id': this.user.id,
                'title': this.title,
                'description': this.description,
                'location_id': this.locationId,
                'category_id': this.categoryId,
                'specification_id': this.specificationId,
            };

            try {
                let response = await window.axios.post('/api/services', data,{
                    headers:{
                        'Authorization': `Bearer ${this.token.access_token}`
                    },
                });
                this.handleSuccess(response);
            }
            catch(err) {
                this.handleError(err);
            }
        },
        handleError(err){
            let data = err.response.data;
            console.log(data);
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                title: 'Falha na Solicitação do Serviço, por favor tente mais tarde!!'
                })
        },

        handleSuccess(response){
            const Toast = Swal.mixin({
                toast: true,
                position: 'center',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                    icon: 'success',
                title: 'Serviço Solicitado com sucesso!!'
                }).then(function(){
                    location.reload();
                })
            this.resetData();

        },

        resetData() {
            this.title = '';
            this.categoryId = '';
            this.locationId = '';
            this.description = '';
        },
    },
    created() {
        this.getCategories();
        this.getLocations();
        this.getSpecification();
    },
}
</script>

<style>

</style>
