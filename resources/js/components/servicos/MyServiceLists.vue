<template>
  <div>
    <div  class="justify-content-center" >
        <h3 class="mt-5">Serviços solicitados aguardando aprovação</h3>
        <MyServices
                v-for="service in aguardando" :key="service.id" 
                v-bind:service="service"/>

        <h3 class="mt-5">Serviços solicitados em progresso</h3>
        <MyServices
                v-for="service in progredindo" :key="service.id" 
                v-bind:service="service"/>


        <h3 class="mt-5">Serviços Solicitados Concluídos</h3>
        <MyServices
            v-for="service in conluido" :key="service.id" 
            v-bind:service="service"/>
    </div>
  </div>
</template>

<script>
import MyServices from './MyServices';
import Service from './Service';

export default {
    name:'ServiceLists',
    props:['user','token'],
    components:{
        MyServices,
        Service
    },
    data(){
        return {
            services:[],
            aguardando: [],
            progredindo: [],
            concluido: [],
        }
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

            this.services = data.data;
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

<style>

</style>