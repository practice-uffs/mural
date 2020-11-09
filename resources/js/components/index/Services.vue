<template>
<div class="mt-5">     
    <h2 class="text-center">Nossos serviços</h2>
    <div class="mt-2 row text-center justify-content-around">
        <div v-bind:key="service.id" v-for="service in services" class="col-sm-12 col-md-4 m-3">
            <img class="service-img" :src="service.img" alt="imagem de representação do serviço">
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
                    description:'Criamos soluções acessíveis que cheguem até servidores e estudantes de forma fácil, \
                                 sem complicações. Ferramentas na palma da mão de cada um dos membros de nossa comunidade acadêmica \
                                 que os auxiliem no dia-a-dia, tornando a experiência dentro da comunidade mais Practice. ',
                    img:'img/undraw.co/Taking_notes.png'
                },
                {
                    id:2,
                    title:'Modificações e Atualizações',
                    description:'Crescer é uma experiência compartilhada, portanto nosso crescimento não seria diferente. \
                                 Contamos com a ajuda de toda nossa comunidade para evoluirmos, cada membro pode fazer parte deste crescimento com \
                                 criticas e sugestões de melhorias e correções, aproximando ainda mais a comunidade do crescimento e inovação do Practice e da UFFS!',
                    img:'img/undraw.co/Collaboration.png'
                },
            ]
        }
    }
}
</script>

<style scooped>
.service-img{
    width: 280px;
}
</style>