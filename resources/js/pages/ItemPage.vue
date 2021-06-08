<template>
  <section class="col-8">
      <div class="d-flex justify-content-end col-12">
          <span v-if="!item.github_issue_link && item.status == 4" 
            class="status-tag recusado">{{item.status | status_tag}}</span>
          <span v-if="!item.github_issue_link && item.status != 4"
            class="status-tag aguardando">{{1 | status_tag}}</span>
          <span v-if="item.github_issue_link" class="status-tag"
            :class="item.status|status_class">{{item.status | status_tag}}</span>
      </div>
      <h6>{{item.user}}</h6> 
      <h4>{{item.title}}</h4> 
      <p v-if="item.github_issue_link"><a :href="item.github_issue_link" target="_blank"><small>(issue: #{{issue}}) Acompanhe essa solicitação no GitHub</small></a></p>
      <p><small>Categoria: {{item.category_id}}</small>
         <small v-if="item.specification_id">:{{item.specification_id.title}}</small>, 
         <small>Localização: {{item.location_id}}</small></p>
      <p>{{item.description}}</p>
      <p class="text-end"> <small> última atualização {{item.updated_at | prettyDate}}</small></p>
    <hr>
    <comment-list :user="user" :item-id="item.id" :token="token"></comment-list>
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
.status-tag {
  border-radius: 30px;
  width: fit-content;
  font-size: .9rem;
  padding: 3px 8px;
  margin-bottom: 9px;
  color: #ffffff;
}
.status-tag.aguardando {
  background-color: #ff660098;
}
.status-tag.progresso {
  background-color: #0066ff98;
}
.status-tag.concluido {
  background-color: #009933;
}
.status-tag.recusado {
  background-color: #ff000098;
}
</style>