<template>
<div class="mt-5 text-center">     
    <h2 >Feedbacks</h2>
    <p>Veja as opniões dos nossos clientes</p>
    <div class="mt-2 row justify-content-around">
        <div v-bind:key="feedback.id" v-for="feedback in feedbacks" class="col-sm-12 col-md-4 m-3">
            <h3>{{feedback.title}}</h3>
            <p>{{feedback.description}}</p>
            <p>{{feedback.user}}</p>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name:"services",
    data(){
        return{
            feedbacks:[
                {
                    id:1,
                    title:'Criação de Funcionalidades',
                    description:'Este serviço é ideal para a criação de novas funcionalidades',
                    user:'fulado'
                },
                {
                    id:2,
                    title:'Modificações e Atualizações',
                    description:'Escontrou algum erro? Necessita algum melhoria? Este é o espaço para isso.',
                     user:'ciclano'
                },
            ]
        }
    }
}
</script>

<style>

</style>