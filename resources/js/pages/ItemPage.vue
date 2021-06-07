<template>
    <section class="col-8">
        <h6>Solicitante: {{item.user}}</h6>
        <hr>
        <h4>{{item.title}}</h4>
        <p v-if="item.github_issue_link"><a :href="item.github_issue_link" target="_blank"><small>(issue: #{{issue}}) Acompanhe essa solicitação no GitHub</small></a></p>
        <small>Categoria: {{item.category_id}}</small>
        <small v-if="item.specification_id">- {{item.specification_id.title}}</small> <i>|</i>
        <small>Localização: {{item.location_id}}</small> <i v-if="item.delivery_date">|</i>
        <small v-if="item.delivery_date">Data de Entrega: {{item.delivery_date | formatDate}}</small>
        <p class="my-2">{{item.description}}</p>
        <p class="text-end"> <small> última atualização {{item.updated_at | prettyDate}}</small></p>
        <hr>
        <comment-list :user="user" :item-id="item.id" :token="token" class="my-1"></comment-list>
    </section>
</template>

<script>
import Auth from '../service/Auth';
export default {
    name:'Comments',
    props:['user','item','token'],
    data(){
      return {
        issue: this.item.github_issue_link ? this.item.github_issue_link.split('/').pop():null,
      }
    },
    mounted(){
      Auth.check(this.token);
    },
}
</script>

<style scoped>
    h4{
        font-size: 1.2rem;
        font-weight: bold;
        margin-top: 10px;
    }
</style>
