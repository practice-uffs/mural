<template>
<div class="mt-5 text-center bg-blue py-3">     
    <h2 >Feedbacks</h2>
    <p>Veja as opniões dos nossos clientes</p>
    <div id="carouselExampleControls" class="carousel slide m-5" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item" v-bind:key="feedback.id"  v-for="(feedback,idx) in feedbacks"  v-bind:class="{'active':idx === 0}">
                <div clas="p-5">
                    <h3 class="card-title">{{feedback.title}}</h3>
                    <p class="card-text">{{feedback.description}}</p>
                    <small>{{feedback.user}} - {{ feedback.created_at | formatDate }} </small>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</template>

<script>
import moment from 'moment';

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY')
    }
});
export default {
    name:"feedbacks",
    data(){
        return{
            feedbacks:[
                {
                    id:1,
                    title:'Criação de Funcionalidades',
                    description:'Este serviço é ideal para a criação de novas funcionalidades',
                    user:'fulado',
                    created_at: Date.now(),
                },
                {
                    id:2,
                    title:'Modificações e Atualizações',
                    description:'Escontrou algum erro? Necessita algum melhoria? Este é o espaço para isso.',
                    user:'ciclano',
                    created_at: Date.now(),
                },
            ]
        }
    },

}
</script>

<style scooped>
.bg-blue{
    background-color: #2f7b9a;
    color: #f4f4f4;
}
</style>