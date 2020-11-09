<template>
        <!-- Nuvens separador -->
        <div class="row justify-content-around">
            <img class="separador-nuvens" v-bind:id="'nuvem'+index" :src="nuvens" alt="nuvens das cores do practice, azul, amarelo e laranja" 
                 v-for="index in parseInt(qnt)" :key="index">
        </div> 
</template>

<script>
export default {
    props:['qnt'],
    data(){
        return {
            nuvens:'img/nuvens-practice.png'
        }
    }
}
</script>
<style scoped>
.separador-nuvens{
    margin: 80px;
    width: 180px;
}
@media screen and (max-width: 600px){
 #nuvem2,#nuvem3{
     display: none;
 }
}
</style>