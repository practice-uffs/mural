<template>
<section>
    <div class="row d-flex align-items-center">
        <div class="col-sm-12 col-md-7 text-end">
            <h1>Gerenciamento de Serviços Solicitados</h1>
            <p>Acompanhe aqui os serviços solicitados pelo clientes do PRACTICE</p>
        </div>
        <div class="col-sm-12 col-md-5">
            <img class="img-service" :src="img" alt="">
        </div>
    </div>
    <hr>

    <h2 clas="mt-5">Serviços aguardando aprovação</h2>
    <Services
        v-for="aguardado in aguardados" :key="aguardado.id" 
        v-bind:service="aguardado"/>

    <h2 clas="mt-5">Serviços em progresso</h2>
    <Services
        v-for="progredido in progredidos" :key="progredido.id" 
        v-bind:service="progredido"/>

    <h2 clas="mt-5">Serviços concluídos</h2>
    <Services
        v-for="concluido in concluidos" :key="concluido.id" 
            v-bind:service="concluido"/>

</section>
</template>

<script>
import Auth from './../service/Auth';
import Services from '../components/admin/Services';
export default {
    name:'AdminPage',
    props:['user','token'],
    components:{
        Services
    },
    data(){
        return {
            aguardados: [],
            progredidos: [],
            concluidos: [],
            img:'/img/undraw.co/admin.png',
        }
    },
    mounted(){
      Auth.check(this.token);
    },
    methods:{
        async fetchServices() {
            let { data } = await axios.get('/api/services',{
                headers:{
                    'Authorization': `Bearer ${this.token.access_token}`
                },
                params:{
                    user_id:this.user.id,
                }
            });

            let servicos = data.data.reverse()
            for(var i=0; i < servicos.length; i++){
                if(servicos[i].status == 1){
                    this.aguardados.push(servicos[i])
                }else if(servicos[i].status == 2){
                    this.progredidos.push(servicos[i])
                }else if(servicos[i].status == 3){
                    this.concluidos.push(servicos[i])
                }
            }
        },
    },
    created() {
        this.fetchServices();
    },
}
</script>

<style scoped>
.img-service{
    width: 400px;
}
</style>