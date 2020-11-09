<template>
  <div>
    <h5>Veja o que nossa comunidade já compartilhou </h5>
    <div  class="row justify-content-center" >
        <Feedback
                v-for="feedback in feedbacks" :key="feedback.id" 
                v-bind:feedback="feedback" class="col-sm-12 col-md-5 col-xl-3"/>
    </div>
  </div>
</template>

<script>
import Feedback from './Feedback';

export default {
    name:'FeedbackList',
    components:{
        Feedback,
    },
    data(){
        return {
            feedbacks:[],
        }
    },
    methods:{
        async fetchFeedbacks() {
            let { data } = await axios.get('/api/feedbacks');

            this.feedbacks = data.data;
        },
    },
    created() {
        this.fetchFeedbacks();
    }
}
</script>

<style>

</style>