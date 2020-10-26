<template >
    <nav class="navbar navbar-expand-sm navbar-dark bg-light mb-2 ">
        <div class="container">
            <a href="#" class="navbar-brand">
                 <img :src="logo" width="140" alt="Logo Practice">
            </a>
            <div  class="nav-item">
                <a v-if="auth" href="/login" class="nav-link"><i class="material-icons">login</i> Entrar </a>
                <a v-else> usuario e foto </a>
            </div>
        </div>
    </nav>
</template>
<script>
export default {
    props:[
        'auth'
    ],
    data(){
        return{
            logo : '/img/logo-practice.png'
        }
    }
}
</script>

<style>

</style>
