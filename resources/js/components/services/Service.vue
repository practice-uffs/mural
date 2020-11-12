<template>
  <div class="card-service row p-3">
      <img class="col-sm-12 col-md-5 align-items-center
                  img-tumb"
          :src="service.img" alt="" />
      <div class="col-sm-12 col-md-7">
        <h4>{{service.title}}</h4>
        <p class="text-justify">{{service.description}}</p>
        <div class="row pl-3 p-1"> 
          <button class="btn btn-info">Solicitar</button> 
          <p class="align-items-center m-2 ">Prazo: {{service.deadline}} días(úteis)</p>
        </div>
        <strong v-if="service.example" ><p>Examplo: <a :href="service.example">{{service.example}}</a></p></strong>
      </div>
  </div>
</template>

<script>

export default {
    name:'Service',
    props:['service']
}
</script>

<style>
@media screen and (max-width: 600px){
  .img-tumb{
    min-width: 50px;
  }
}
  .img-tumb{
    max-width: 215px;
    max-height: 150px;
  }

</style>