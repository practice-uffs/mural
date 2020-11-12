<template>
  <div>
    <div  class="justify-content-center" >
        <h5>Meus Serviços Solicitados</h5>
        <MyServices
                v-for="service in services" :key="service.id" 
                v-bind:service="service"/>
        <h5>Audio</h5>
        <h5>Vídeos</h5>
        <h5>Estúdio</h5>
        <h5>Texto e Imagem</h5>
        <h5>Evento</h5>
    </div>
  </div>
</template>

<script>
import moment from 'moment'
import MyServices from './MyServices';

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY')
    }
}); 

export default {
    name:'ServiceLists',
    props:['user'],
    components:{
        MyServices
    },
    data(){
        return {
            services:[],
        }
    },
    methods:{
        async fetchServices() {
            let { data } = await axios.get('/api/services',{
                params:{
                    user_id:this.user.id,
                }
            });

            this.services = data.data;

        },
    },
    created() {
        this.fetchServices();
    }
}
</script>

<style>

</style>