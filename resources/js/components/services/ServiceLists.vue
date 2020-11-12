<template>
  <div>
    <div  class="justify-content-center" >
        <h3>Meus Serviços Solicitados</h3>
        <MyServices
                v-for="service in services" :key="service.id" 
                v-bind:service="service"/>
        <h3>Audio</h3>
        <Service class="justify-content-center"
                v-for="service in audios" :key="service.id" 
                v-bind:service="service"/>
        <h3>Vídeos</h3>
        <h3>Estúdio</h3>
        <h3>Texto e Imagem</h3>
        <h3>Evento</h3>
    </div>
  </div>
</template>

<script>
import moment from 'moment'
import MyServices from './MyServices';
import Service from './Service';
import {AUDIOS} from './json/services.json';

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY')
    }
}); 

export default {
    name:'ServiceLists',
    props:['user'],
    components:{
        MyServices,
        Service
    },
    data(){
        return {
            services:[],
            audios: AUDIOS
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