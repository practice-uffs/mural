<template>
    <header class=''>
        <div class="container row justify-content-around">
            <div>
                <h1>Seja Bem-vinde ao</h1>
                <p>Portal de serviçoes do <strong>Practice</strong></p>
            </div>
            <div>
                <h1>Web Feedback</h1>
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
            banner:'img/banner-practice.png',
        }
    }
}
</script>