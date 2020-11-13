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

        <h3>Texto</h3>
        <div class="row">
            <Service class="justify-content-center
                            col-sm-12 col-md-6 "
                v-for="service in textos" :key="service.id" 
                v-bind:service="service"/>
        </div>
        <div class="text-justify mb-5 m-3 px-5">
            <p><strong>Obs:</strong> As solicitações dos serviços de texto precisam conter: Autor(es), Título e Subtítulo, Imagens e gráficos com indicações de ordem que serão apresentadas no texto,
                Referências bibliográficas utilizadas já dentro das normas ABNT; Caso seja necessário, licenças de direitos autorais das imagens utilizadas </p>
            <p><strong>Orientações bem estabelecidas de design:</strong> Imagens em boa resolução, Referências de onde as imagens foram retiradas, Imagens salvas em formato JPE </p>
        </div>

        <h3>Imagens</h3>
        <div class="row">
            <Service class="justify-content-center
                            col-sm-12 col-md-6 "
                v-for="service in imagens" :key="service.id" 
                v-bind:service="service"/>
        </div>

        <h3>Evento</h3>
        <div class="row">
            <Service class="justify-content-center
                            col-sm-12 col-md-6 "
                v-for="service in eventos" :key="service.id" 
                v-bind:service="service"/>
        </div>

        <h3>Estúdio</h3>
        <div class="row">
            <Service class="justify-content-center
                            col-sm-12 col-md-6 "
                v-for="service in estudio" :key="service.id" 
                v-bind:service="service"/>
        </div>
    </div>
  </div>
</template>

<script>
import moment from 'moment'
import MyServices from './MyServices';
import Service from './Service';
import {AUDIOS,VIDEOS,TEXTOS,IMAGENS,EVENTOS} from './json/services.json';

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
            textos: TEXTOS,
            imagens: IMAGENS,
            estudio: [],
            eventos: EVENTOS,
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