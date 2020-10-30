<template>
<div class="card m-1" >
  <div class="card-body">
    <h5 class="card-title">{{feedback.title}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{feedback.user.name}} - {{feedback.created_at | formatDate}}</h6>
    <p class="card-text">{{feedback.description}}</p>
    <!-- <a href="" class="card-link">Localização {{feedback.location_id}}</a>
    <a href="" class="card-link">Categoria {{feedback.category_id}}</a> -->
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
    name:'Feedback',
    props:['feedback']
}
</script>

<style>


</style>