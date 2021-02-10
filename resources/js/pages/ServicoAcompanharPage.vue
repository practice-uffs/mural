<template>
    <section>
        <div class="row d-flex align-items-center">
            <div class="col-sm-12 col-md-7 text-right">
                <h2>Serviços</h2>
                <p>Acompanhe aqui seus serviços solicitados</p>
            </div>
            <div class="col-sm-12 col-md-5">
                <img class="img-service" :src="img" alt="">
            </div>
        </div>
        <hr>
        <MyServiceLists :user="user" :token="token" />
    </section>
</template>

<script>
import Auth from './../service/Auth';
import MyServiceLists from '../components/servicos/MyServiceLists';

export default {
    name:"services",
    components:{
        MyServiceLists,
    },
    props:['user','token'],
    data(){
        return {
            img:'/img/undraw.co/acompanhar.png',
        }
    },
    mounted(){
        Auth.check(this.token);
    },
}
</script>

<style scoped>
.img-service{
    width: 400px;
}
</style>