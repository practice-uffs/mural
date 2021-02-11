<template>
  <div>
    <div  class="justify-content-center" >
    <h2 clas="mt-5">Serviços solicitados aguardando aprovação</h2>
    <MyServices
        v-for="aguardado in aguardados" :key="aguardado.id" 
        v-bind:service="aguardado"/>

    <h2 clas="mt-5">Serviços solicitados em progresso</h2>
    <MyServices
        v-for="progredido in progredidos" :key="progredido.id" 
        v-bind:service="progredido"/>

    <h2 clas="mt-5">Serviços solicitados concluídos</h2>
    <MyServices
        v-for="concluido in concluidos" :key="concluido.id" 
            v-bind:service="concluido"/>

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
            aguardados: [],
            progredidos: [],
            concluidos: [],
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
    }
}
</script>

<style>

</style>