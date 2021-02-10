<template>
  <div class="col-8">
      <h6>{{item.user}}</h6> 
      <h4>{{item.title}}</h4> 
      <p v-if="item.github_issue_link"><a :href="item.github_issue_link" target="_blank"><small>(issue: #{{issue}}) Acompanhe essa solicitação no GitHub</small></a></p>
      <p><small>Categoria: {{item.category_id}}</small>
         <small v-if="item.specification_id">:{{item.specification_id.title}}</small>, 
         <small>Localização: {{item.location_id}}</small></p>
      <p>{{item.description}}</p>
      <p class="text-right"> <small> última atualização {{item.updated_at | prettyDate}}</small></p>
    <hr>
    <comment-list :user="user" :item-id="item.id" :token="token"></comment-list>
  </div>
</template>

<script>
import Auth from '../service/Auth';
export default {
    name:'Comments',
    props:['user','item','token'],
    data(){
      return {
        issue: this.item.github_issue_link.split('/').pop(),
      }
    },
    mounted(){
      Auth.check(this.token);
    },
}
</script>

<style>

</style>