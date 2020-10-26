<template>
    <header class=''>
        <div class="container row justify-content-around">
            <div>
                <h1>Seja Bem-vinde ao</h1>
                <p>Portal de serviçoes do <strong>Practice</strong></p>
            </div>
            <div>
                <img :src="logo" width="200" alt="Logo Practice">
            </div>
        </div>

        <!-- Banner separador -->    
        <img :src="banner" width="100%" alt="banner das cores do practice, azul, amarelo e laranja">
    </header>
</template>

<script>
export default {
    data(){
        return {
            banner:'img/banner-practice.png',
            logo:'img/logo-practice.png',
        }
    }
}
</script>