<template>
  <div class="card-service row">
      <img v-if="service.id % 2 === 0" 
          :src="service.img" alt="" />
      <div class="col-8">
        <h4>{{service.title}}</h4>
        <p>{{service.description}}</p>
        <div class="row pl-3 p-1"> 
          <button class="btn btn-info">Solicitar</button> 
          <p class="align-items-center m-2 ">Prazo: {{service.deadline}} días(úteis)</p>
        </div>
      </div>
      <img v-if="service.id % 2 !== 0" 
          :src="service.img" alt="" />
  </div>
</template>

<script>

export default {
    name:'Service',
    props:['service']
}
</script>

<style>
.card-service{
}
img{
  width: 250px;
}

</style>