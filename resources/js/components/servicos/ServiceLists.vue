<template>
  <div>
    <div  class="justify-content-center" >
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
import MyServices from './MyServices';
import Service from './Service';
import {AUDIOS,VIDEOS,TEXTOS,IMAGENS,EVENTOS,ESTUDIO} from './json/services.json';

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
            audios: AUDIOS,
            videos: VIDEOS,
            textos: TEXTOS,
            imagens: IMAGENS,
            eventos: EVENTOS,
            estudio: ESTUDIO,
        }
    },
}
</script>

<style>

</style>