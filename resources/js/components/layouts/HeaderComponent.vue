<template>
    <header class=''>
        <div class="container row justify-content-around">
            <div>
                <h1>Seja Bem-vindo ao</h1>
                <p>Portal de serviços do <strong>Practice</strong></p>
            </div>
            <div class="ml-5">
                <img class="logo-webfeedback text-right" :src="logo" alt="logotipo do web feedback">
            </div>
        </div>

        <banner> </banner>
    </header>
</template>

<script>
import Banner from './Banner';
export default {
    components:{
        Banner,
    },
    data(){
        return {
            logo:'../../img/logo-webfeedback.png',
        }
    }
}
</script>
<style scoped>
.logo-webfeedback{
    width: 400px;
}
</style>