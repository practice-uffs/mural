<template>
    <div class="col-lg-4 col-md-6" data-aos-delay="700">
        
      <div class="service-box " :class="color">
        <i class="icon" :class="icon"></i>
        <h3>{{service.title}}</h3>
        <p>{{service.description}}</p>
        <small><strong v-if="service.example" ><p>Exemplo: <a :href="service.example">{{service.example}}</a></p></strong></small>
        <small><p><b>Prazo:</b> {{service.deadline}} días(úteis)</p></small>
        <a href="#" class="read-more"><span>Solicitar</span> <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
</template>

<script>

export default {
    name:'Service',
    props:['service','color','icon']
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