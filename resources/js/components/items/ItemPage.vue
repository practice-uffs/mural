<template>
  <div class="col-8">
      <h4>{{item.title}}</h4>
      <p v-if="item.github_issue_link"><a :href="item.github_issue_link" target="_blank"><small>Acompanhe essa solicitação no GitHub</small></a></p>
      <p>{{item.description}}</p>
      <p class="text-right"> <small> última atualização {{item.updated_at | prettyDate}}</small></p>
    <hr>
    <comment-list :user="user" :item-id="item.id"></comment-list>
  </div>
</template>

<script>
export default {
    name:'Comments',
    props:['user','item'],
}
</script>

<style>

</style>