<template>
  <div>
    <div  class="justify-content-center" >
        <h3>Meus Serviços Solicitados</h3>
        <MyServices
                v-for="service in services" :key="service.id" 
                v-bind:service="service"/>
        <h3>Audio</h3>
        <div class="row">
            <Service class="justify-content-center
                            col-sm-12 col-md-6 "
                    v-for="service in audios" :key="service.id" 
                    v-bind:service="service"/>
        </div>
        <h3>Vídeos</h3>
        <div class="row">
            <Service class="justify-content-center
                            col-sm-12 col-md-6 "
                    v-for="service in videos" :key="service.id" 
                    v-bind:service="service"/>
        </div>
        <h3>Estúdio</h3>
            <Service class="justify-content-center
                            col-sm-12 col-md-6 "
                v-for="service in txts_imgs" :key="service.id" 
                v-bind:service="service"/>
        <h3>Texto e Imagem</h3>
            <Service class="justify-content-center
                            col-sm-12 col-md-6 "
                v-for="service in estudio" :key="service.id" 
                v-bind:service="service"/>
        <h3>Evento</h3>
            <Service class="justify-content-center
                            col-sm-12 col-md-6 "
                v-for="service in eventos" :key="service.id" 
                v-bind:service="service"/>
    </div>
  </div>
</template>

<script>
import moment from 'moment'
import MyServices from './MyServices';
import Service from './Service';
import {AUDIOS,VIDEOS} from './json/services.json';

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
            audios: AUDIOS,
            videos: VIDEOS,
            txts_imgs: [],
            estudio: [],
            eventos: [],
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