<template>
<section>
    <div class="row d-flex align-items-center">
        <div class="col-sm-12 col-md-7 text-right">
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
            v-for="service in services" :key="service.id" 
            v-bind:service="service"/>

    <div v-if="!aguardando.length">
        <h2 clas="mt-5">Serviços aguardando aprovação</h2>
        <Services
            v-for="service in aguardando" :key="service.id" 
            v-bind:service="service"/>
    </div>
    <div v-else>
        <h3 class="mt-5">Não há serviços solicitados em aprovação no momento</h3>
    </div>

    <div v-if="!progredindo.length">
        <h2 clas="mt-5">Serviços em progresso</h2>
        <Services
            v-for="service in progredindo" :key="service.id" 
            v-bind:service="service"/>
    </div>
    <div v-else>
        <h3 class="mt-5">Não há serviços solicitados em progresso no momento</h3>
    </div>

    <div v-if="!concluido.length">
        <h2 clas="mt-5">Serviços concluídos</h2>
        <Services
            v-for="service in concluido" :key="service.id" 
            v-bind:service="service"/>
    </div>
    <div v-else>
        <h3 class="mt-5">Não há serviços solicitados e concluídos no momento</h3>
    </div>
</section>
</template>

<script>
import Auth from './../service/Auth';
import Services from '../components/admin/Services'
export default {
    name:'AdminPage',
    props:['user','token'],
    components:{
        Services
    },
    data(){
        return {
            services:[],
            aguardando: [],
            progredindo: [],
            concluido: [],
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

            this.services = data.data.reverse();

            this.aguardando = this.services.filter((servico) => {
                return servico.status === 1;
            })
            this.progredindo = this.services.filter((servico) => {
                return servico.status === 2;
            })
            this.concluido = this.services.filter((servico) => {
                return servico.status === 3;
            })
        },
    },
    created() {
        this.fetchServices();
    }
}
</script>

<style scoped>
.img-service{
    width: 400px;
}
</style>