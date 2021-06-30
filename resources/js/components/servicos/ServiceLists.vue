<template>
<div>  
    <div id="portfolio" class="portfolio">

        <div class="container aos-init aos-animate mt-5" data-aos="fade-up">

            <header class="section-header">
                <h2>Serviços</h2>
            </header>

            <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">Todos</li>
                    <li data-filter=".filter-audio">Áudio</li>
                    <li data-filter=".filter-video">Vídeo</li>
                    <li data-filter=".filter-texto">Texto</li>
                    <li data-filter=".filter-imagem">Imagem</li>
                    <li data-filter=".filter-midia">Mídia</li>
                    <li data-filter=".filter-estudio">Estúdio</li>
                    </ul>
                </div>
            </div>

            <div class="row gy-4 portfolio-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="position: relative; height: 3699px;">
                <section id="services" class="services portfolio-item filter-audio pt-0">
                    <div class="container">
                        <div class="row gy-4">
                            <header class="section-header">
                                <p>Áudio</p>
                            </header>
                            <Service class="justify-content-center
                                    col-s'm-12 col-md-6"
                                v-for="service in audios" :key="service.id"
                                v-bind:service="service" color="red"  icon="ri-discuss-line"/>
                        </div>
                    </div>
                </section>

                <section id="services" class="services portfolio-item filter-video pt-0">
                    <div class="container">
                        <div class="row gy-4">
                            <header class="section-header">
                                <p>Vídeo</p>
                            </header>
                            <Service class="justify-content-center
                                    col-sm-12 col-md-6 "
                                v-for="service in videos" :key="service.id"
                                v-bind:service="service" color="orange"  icon="ri-discuss-line"/>
                        </div>
                    </div>
                </section>

                <section id="services" class="services portfolio-item filter-texto pt-0">
                    <div class="container">
                        <div class="row gy-4">
                            <header class="section-header">
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

                <section id="services" class="services portfolio-item filter-imagem pt-0">
                    <div class="container">
                        <div class="row gy-4">
                            <header class="section-header">
                                <p>Imagem</p>
                            </header>
                            <Service class="justify-content-center
                                    col-sm-12 col-md-6"
                                v-for="service in imagens" :key="service.id"
                                v-bind:service="service" color="green"  icon="ri-discuss-line"/>
                        </div>
                    </div>
                </section>

                <section id="services" class="services portfolio-item filter-midia pt-0">
                    <div class="container">
                        <div class="row gy-4">
                            <header class="section-header">
                                <p>Mídia</p>
                            </header>
                            <Service class="justify-content-center
                                    col-sm-12 col-md-6"
                                v-for="service in eventos" :key="service.id"
                                v-bind:service="service" color="blue"  icon="ri-discuss-line"/>
                        </div>
                    </div>
                </section>

                <section id="services" class="services portfolio-item filter-estudio pt-0">
                    <div class="container">
                        <div class="row gy-4">
                            <header class="section-header">
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
