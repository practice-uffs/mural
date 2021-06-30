<template>
  <div>
    <div  class="justify-content-center" >
        <h2 class="my-3">Serviços solicitados aguardando aprovação</h2>
        <div class="row container">
            <MyServices
                v-for="aguardado in aguardados" :key="aguardado.id" v-bind:token="token" v-bind:service="aguardado"/>
        </div>

        <h2 class="my-3">Serviços solicitados em progresso</h2>
        <div class="row container">
            <MyServices
                v-for="progredido in progredidos" :key="progredido.id" v-bind:token="token" v-bind:service="progredido"/>
        </div>

        <h2 class="my-3">Serviços solicitados concluídos</h2>
        <div class="row container">
            <MyServices
                v-for="concluido in concluidos" :key="concluido.id" v-bind:token="token" v-bind:service="concluido"/>
        </div>

        <h2 class="my-3">Serviços solicitados recusados</h2>
        <div class="row container">
            <MyServices
                v-for="recusado in recusados" :key="recusado.id" v-bind:token="token" v-bind:service="recusado"/>
        </div>

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
            recusados:[],
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
                if(servicos[i].status == 1 && servicos[i].user_id == this.user.id){
                    this.aguardados.push(servicos[i])
                }else if(servicos[i].status == 2 && servicos[i].user_id == this.user.id){
                    this.progredidos.push(servicos[i])
                }else if(servicos[i].status == 3 && servicos[i].user_id == this.user.id){
                    this.concluidos.push(servicos[i])
                }else if(servicos[i].status == 4 && servicos[i].user_id == this.user.id){
                    this.recusados.push(servicos[i])
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
