<template>
  <div>
    <div  class="justify-content-center" >
        <section id="services" class="services">
            <div class="container">
                <div class="row gy-4">
                    <header class="section-header">
                        <h2>Serviços</h2>
                        <p>Áudio</p>
                    </header>
                    <Service class="justify-content-center
                                    col-sm-12 col-md-6 "
                            v-for="service in audios" :key="service.id"
                            v-bind:service="service" color="red"  icon="ri-discuss-line"/>
                </div>
            </div>
        </section>

        <section id="services" class="services">
            <div class="container">
                <div class="row gy-4">
                    <header class="section-header">
                        <h2>Serviços</h2>
                        <p>Vídeo</p>
                    </header>
                    <Service class="justify-content-center
                                    col-sm-12 col-md-6 "
                            v-for="service in videos" :key="service.id"
                            v-bind:service="service" color="orange"  icon="ri-discuss-line"/>
                </div>
            </div>
        </section>

        <section id="services" class="services">
            <div class="container">
                <div class="row gy-4">
                    <header class="section-header">
                        <h2>Serviços</h2>
                        <p>Texto</p>
                    </header>
                    <div class="text-justify mb-5 m-3 px-5">
                        <p><strong>As solicitações dos serviços de texto precisam conter:</strong> autor(es), título e subtítulo, imagens e gráficos com indicação da ordem que serão apresentadas no texto, referências bibliográficas utilizadas (dentro das normas ABNT) e, caso seja necessário, licenças de direitos autorais das imagens utilizadas.</p>
                        <p><strong>Orientações bem estabelecidas de design:</strong> imagens em boa resolução, referências de onde as imagens foram retiradas e imagens salvas em formato JPEG. </p>
                    </div>
                        <Service class="justify-content-center
                                    col-sm-12 col-md-6"

                        v-for="service in textos" :key="service.id"
                        v-bind:service="service" color="yellow"  icon="ri-discuss-line"/>
                </div>
            </div>
        </section>

        <section id="services" class="services">
            <div class="container">
                <div class="row gy-4">
                    <header class="section-header">
                        <h2>Serviços</h2>
                        <p>Imagem</p>
                    </header>
                    <Service class="justify-content-center
                                    col-sm-12 col-md-6 "
                        v-for="service in imagens" :key="service.id"
                        v-bind:service="service" color="green"  icon="ri-discuss-line"/>
                </div>
            </div>
        </section>

        <section id="services" class="services">
            <div class="container">
                <div class="row gy-4">
                    <header class="section-header">
                        <h2>Serviços</h2>
                        <p>Mídia</p>
                    </header>
                    <Service class="justify-content-center
                                    col-sm-12 col-md-6"
                        v-for="service in eventos" :key="service.id"
                        v-bind:service="service" color="blue"  icon="ri-discuss-line"/>
                </div>
            </div>
        </section>


        <section id="services" class="services">
            <div class="container">
                <div class="row gy-4">
                    <header class="section-header">
                        <h2>Serviços</h2>
                        <p>Estúdio</p>
                    </header>
                    <Service class="justify-content-center
                                    col-sm-12 col-md-6 "
                        v-for="service in estudio" :key="service.id"
                        v-bind:service="service" color="purple"  icon="ri-discuss-line"/>
               </div>
            </div>
        </section>

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
