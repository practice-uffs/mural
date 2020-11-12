<template>
    <section>
    <div class="row d-flex align-items-center">
        <div class="col-sm-12 col-md-8 text-right">
            <h2>Serviços </h2>
            <p>Temos um conjunto muito variado de serviços que podem ser utilizados pela comunidade acadêmica. Precisa de algo? Nós podemos ajudar!</p>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ServiceModal">Solicitar Serviço</button>
        </div>
        <div class="col-sm-12 col-md-4">
            <img class="img-service" :src="img" alt="">
        </div>
    </div>
    <hr>
    <ServiceLists :user="user" />
    </section>
</template>

<script>
import ServiceLists from './ServiceLists';

export default {
    name:"services",
    components:{
        ServiceLists,
    },
    props:['user'],
    data(){
        return {
            img:'/img/undraw.co/User_flow.png',
        }
    },
}
</script>

<style scoped>
.img-service{
    width: 400px;
}
</style>