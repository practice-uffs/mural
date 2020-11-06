<template>
          <form @submit.prevent="create" class="mb-3">
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" 
                       id="title" placeholder="Título"
                       v-model="title" required>
                <span class="helper-text">Ex.: Jogos digitais em aula</span>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea type="text" class="form-control" 
                       id="description" placeholder="Descrição"
                       v-model="description" required>
                </textarea>
            </div>

            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select class="form-control" v-model="categoryId" required>
                    <option value="" disabled selected>Selecione uma categoria</option>
                    <option
                        v-for="categoria in categorias"
                        :key="categoria.id"
                        :value="categoria.id"
                    >{{categoria.name}}</option>
                </select>
            </div> 
            <div class="form-group">
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-warning d-flex align-items-center ">Enviar <span class="material-icons">send </span> </button>
            </div>
        </form>
</template>
<script>
import Swal from 'sweetalert2';

const FEEDBACK = 1;

export default {
    props:['user'],
    data(){
        return {
            className:'',
            categorias:null,
            localizacoes:null,

            title:'',
            description:'',
            locationId:null,
            categoryId:null,
            hidden:false,
        }
    },
    updated(){
        this.RemoveSelectWrapper();
    },
    methods:{
        RemoveSelectWrapper(){
            $('.select-dropdown').remove();
            $('.caret').remove();
        },
        async getCategories(){
            let {data} = await window.axios.get('/api/categories',{
                params: {
                    'item_type': FEEDBACK,
                }
            });
            this.categorias = data
        },
        async getLocations(){
            let {data} = await window.axios.get('/api/locations');
            this.localizacoes = data;
        },
        async create() {          
            let data = {
                'user_id': this.user.id,
                'title': this.title,
                'description': this.description,
                'location_id': this.locationId,
                'category_id': this.categoryId,
                'hidden': this.hidden,
            };

            try {
                let response = await window.axios.post('/api/feedbacks', data);
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
                title: 'Falha no envio do Feedback, por favor tente mais tarde!!'
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
                title: 'Feedback Enviado com sucesso!!'
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
            this.hidden = this.hidden;
        },
    },
    created() {
        this.getCategories();
        this.getLocations();
    },
}
</script>

<style>

</style>