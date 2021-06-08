<template>
    <section class="mb-3 container">
        <form @submit.prevent="create">
            <h2>Edição da solicitação #{{item.id}}</h2>
            <hr>
            <div class="form-group m-2">
                <label for="title">Título</label>
                <input type="text" class="form-control"
                       id="title" placeholder="Título"
                       v-model="title" required>
                <small><span class="helper-text text-muted">Ex.: Jogos digitais em aula</span></small>
            </div>
            <div class="form-group m-2">
                <label for="description">Descrição</label>
                <textarea type="text" class="form-control"
                       id="description" placeholder="Descrição"
                       v-model="description" required>
                </textarea>
            </div>
            <div class="form-group m-2">
                <label for="delivery_date">Data de Entrega</label>
                <input type="date" class="form-control"
                       id="delivery_date" style="width:auto;" v-model="delivery_date" :min="min_date" required>
                <small><span class="helper-text text-muted">
                    Prazo mínimo de 10 dias.
                </span></small>
            </div>
            <div class="form-group m-2">
                <label for="categoria">Tipo de Serviço</label>
                <select id="category" class="form-control" v-model="categoryId" required
                        @change="filterSpecification">
                    <option value="" disabled selected>Selecione um tipo de serviço</option>
                    <option
                        v-for="categoria in categorias"
                        :key="categoria.id"
                        :value="categoria.id"
                    >{{categoria.name}}</option>
                </select>
                <div v-if="item.type==2">
                    <label for="categoria">Especificação do Serviço</label>
                    <select id="specification" class="form-control" v-model="specificationId" required >
                        <option value="" disabled selected>Selecione a especificação do serviço</option>
                        <option
                            v-for="specification in select_specifications"
                            :key="specification.id"
                            :value="specification.id"
                        >{{specification.title}}</option>
                    </select>
                    <small><span class="helper-text text-muted">Em caso de dúvidas sobre os tipos de serviços do PRACTICE, consulte nosso <a href="https://practice.uffs.cc/" target="_blank">site</a>.</span>
                    </small>
                </div>
            </div>
            <div class="form-group m-2">
                <label for="categoria">Localização</label>
                <select id="localization" class="form-control" v-model="locationId" required>
                    <option value="" disabled selected>Selecione a Localização da Solicitação</option>
                    <option
                        v-for="localizacao in localizacoes"
                        :key="localizacao.id"
                        :value="localizacao.id"
                    >{{localizacao.name}}</option>
                </select>
            </div>

            <div class="form-group my-2" v-if="user.type=='admin' && item.type==2">
                <hr class="my-3">
                <h4 class="my-2">Dados disponíveis apenas para adminstradores</h4>
                <div class="form-group m-2">
                    <label for="github_issue_link">GitHub Issue Link</label>
                    <input type="text" class="form-control"
                        id="github_issue_link" placeholder="GitHub Issue Link"
                        v-model="github_issue_link">
                </div>
                <div class="form-group m-2">
                    <label for="categoria">Status da Solicitação</label>
                    <select class="form-control" v-model="status" required >
                        <option value="1">No Aguardo</option>
                        <option value="2">Em Processo</option>
                        <option value="3">Concluído</option>
                        <option value="4">Recusado</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-warning d-flex align-items-center ">Enviar <span class="material-icons">send </span> </button>
            </div>
        </form>
    </section>
</template>
<script>
import Auth from '../service/Auth';
import Swal from 'sweetalert2';

export default {
    props:['user','token','item'],
    data(){
        return {
            className:'',
            categorias:null,
            localizacoes:null,
            specifications:null,
            select_specifications:null,

            title:this.item.title,
            description:this.item.description,
            locationId:this.item.location_id,
            categoryId:this.item.category_id,
            specificationId:this.item.specification_id,
            github_issue_link:this.item.github_issue_link,
            status:this.item.status,
            min_date:new Date(this.item.created_at),
            delivery_date: this.item.delivery_date,
        }
    },
    mounted(){
      Auth.check(this.token);
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
                    'item_type': this.item.type,
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
            this.select_specifications = data;
        },
        async create() {
            Auth.check(this.token);
            let data = {
                'id':this.item.id,
                'title': this.title,
                'description': this.description,
                'location_id': this.locationId,
                'category_id': this.categoryId,
                'specification_id': this.specificationId,
                'github_issue_link':this.github_issue_link,
                'status':this.status,
                'delivery_date': this.delivery_date,
            };

            if(this.checkDeliveryDate()){
                try {
                    let response = await window.axios.put(`/api/services/${this.item.id}`, data,{
                        headers:{
                            'Authorization': `Bearer ${this.token.access_token}`
                        },
                    });
                    this.handleSuccess(response);
                }
                catch(err) {
                    this.handleError(err);
                }
            }
            else{
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
                title: 'Selecione uma Data de Entrega válida!!'
                })
            }
        },
        checkDeliveryDate(){
            if(new Date(this.delivery_date) < new Date(this.min_date) || !this.delivery_date){
                return false;
            }
            return true;
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
                title: 'Falha na Edição do Serviço, por favor tente mais tarde!!'
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
                    title: 'Serviço Editado com sucesso!!'
                }).then(function(){
                    location.href = '/servicos/acompanhar';
                })

        },
        resetData() {
            this.title = '';
            this.categoryId = '';
            this.locationId = '';
            this.description = '';
            this.delivery_date = '';
        },
    },
    created() {
        this.getCategories();
        this.getLocations();
        if(this.item.type==2){
            this.getSpecification();
        }
        this.min_date = new Date(this.min_date.setDate(this.min_date.getDate() + 10)).toISOString("yyyy-mm-dd").substring(0, 10);
    },
}
</script>

<style scoped>
    h2{
        font-weight: bold;
        font-size: 1.2rem;
    }
    h4{
        font-weight: bold;
    }
</style>
