<template>
<div class="mt-5">     
    <h2 class="text-center">Nossos serviços</h2>
    <div class="mt-2 row text-center justify-content-around">
        <div v-bind:key="service.id" v-for="service in services" class="col-sm-12 col-md-4 m-3">
            <h3>{{service.title}}</h3>
            <p>{{service.description}}</p>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name:"services",
    data(){
        return{
            services:[
                {
                    id:1,
                    title:'Criação de Funcionalidades',
                    description:'Este serviço é ideal para a criação de novas funcionalidades'
                },
                {
                    id:2,
                    title:'Modificações e Atualizações',
                    description:'Escontrou algum erro? Necessita algum melhoria? Este é o espaço para isso.'
                },
            ]
        }
    }
}
</script>

<style>

</style>