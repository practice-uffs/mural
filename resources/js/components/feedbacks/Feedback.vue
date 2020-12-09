<template>
<div class="card m-1" >
<a class="card-link" :href="'/feedback/'+feedback.id">
  <div class="card-body text-left">
    <h5 class="card-title">{{feedback.title}}</h5>
    <p class="card-subtitle mb-2 text-muted"><small>{{feedback.user}} - {{feedback.created_at | formatDate}}</small></p>
    <p class="card-text">{{feedback.description}}</p>
    <p class="card-link"><small>{{feedback.location_id}}</small></p>
  </div>
</a>
</div>
</template>

<script>

export default {
    name:'Feedback',
    props:['feedback']
}
</script>

<style>
.card-link:active,
.card-link:hover,
.card-link:visited,
.card-link:link{
  text-decoration: none;
  color: #264653;
}

</style>