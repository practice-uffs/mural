<template>
<div class="mt-5 text-center bg-blue py-3">     
    <h2 >Feedbacks</h2>
    <p>Veja as opiniões dos nossos clientes</p>
    <div id="carouselExampleControls" class="carousel slide m-5" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item" v-bind:key="feedback.id"  v-for="(feedback,idx) in feedbacks"  v-bind:class="{'active':idx === 0}">
                <div clas="p-5">
                    <h3 class="card-title">{{feedback.title}}</h3>
                    <p class="card-text">{{feedback.description}}</p>
                    <small>{{feedback.user.name}} - {{ feedback.created_at | formatDate }} </small>
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
            feedbacks:[]
        }
    },
    methods: {
        async fetchFeedbacks() {
            let { data } = await axios.get('/api/feedbacks?limit=5');

            this.feedbacks = data.data;
        },
    },
    created() {
        this.fetchFeedbacks();
    }

}
</script>

<style scooped>
.bg-blue{
    background-color: #2f7b9a;
    color: #f4f4f4;
}
</style>