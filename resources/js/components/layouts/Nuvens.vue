<template>
        <!-- Nuvens separador -->
        <div class="row justify-content-around">
            <img class="separador-nuvens" :src="nuvens" alt="nuvens das cores do practice, azul, amarelo e laranja" v-for="index in parseInt(qnt)" :key="index">
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
</style>