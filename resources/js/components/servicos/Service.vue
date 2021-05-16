<template>
    <div class="col-lg-4 col-md-6 d-flex flex-column" data-aos-delay="700">

        <div class="p-1 warning" v-if="!service.available">
            <p><b>Aviso:</b> serviço temporariamente indisponível</p>
        </div>
        <div class="service-box " :class="color">
            <i class="icon" :class="icon"></i>
            <h3>{{service.title}}</h3>
            <p>{{service.description}}</p>
            <small><strong v-if="service.example" ><p>Exemplo: <a :href="service.example">{{service.example}}</a></p></strong></small>
            <small>
            <p v-if="service.deadline">
                <b>Prazo:</b> {{service.deadline}} dias úteis
            </p>
            <p v-else>
                <b>Prazo: Variável</b>
            </p>
            </small>
            <a href="#" class="read-more" v-if="service.available"><span>Solicitar</span> <i class="bi bi-arrow-right"></i></a>
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
    .warning{
        background-color: #f8d7da;
        color: #721c24;
        border-radius: 5px;
        text-align: center;
    }

</style>
