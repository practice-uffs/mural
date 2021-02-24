<template>
  <div>
    <h5>Veja o que nossa comunidade já compartilhou </h5>
    <div>
        <div class="row justify-content-center"  v-if="ideias.length>0">
            <h1 class="my-4 text-center">Ideias</h1>
            <Feedback
                v-for="feedback in ideias" :key="feedback.id" 
                v-bind:feedback="feedback" class="col-sm-12 col-md-5 col-xl-3"/>
        </div>
        <div class="row justify-content-center"  v-if="sugestao.length>0">
            <h1 class="my-4 text-center">Sugestões</h1>
            <Feedback
                v-for="feedback in sugestao" :key="feedback.id" 
                v-bind:feedback="feedback" class="col-sm-12 col-md-5 col-xl-3"/>
        </div>
        
        <div class="row justify-content-center"  v-if="critica.length>0">
            <h1 class="my-4 text-center">Críticas</h1>
            <Feedback
                v-for="feedback in critica" :key="feedback.id" 
                v-bind:feedback="feedback" class="col-sm-12 col-md-5 col-xl-3"/>
        </div>
        
        <div class="row justify-content-center"  v-if="reclamacao.length>0">
            <h1 class="my-4 text-center">Reclamações</h1>
            <Feedback
                v-for="feedback in reclamacao" :key="feedback.id" 
                v-bind:feedback="feedback" class="col-sm-12 col-md-5 col-xl-3"/>
        </div>
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
            ideias:[],
            sugestao:[],
            critica:[],
            reclamacao:[]
        }
    },
    methods:{
        async fetchFeedbacks() {
            let { data } = await axios.get('/api/feedbacks');

            this.feedbacks = data.data.reverse()
            for(var i=0; i < this.feedbacks.length; i++){
                if(this.feedbacks[i].category_id == 'Ideia'){
                    this.ideias.push(this.feedbacks[i])
                }else if(this.feedbacks[i].category_id == 'Sugestão'){
                    this.sugestao.push(this.feedbacks[i])
                }else if(this.feedbacks[i].category_id == 'Crítica'){
                    this.critica.push(this.feedbacks[i])
                }else if(this.feedbacks[i].category_id == 'Reclamação'){
                    this.reclamacao.push(this.feedbacks[i])
                }
            }
        },
    },
    created() {
        this.fetchFeedbacks();
    }
}
</script>

<style>

</style>