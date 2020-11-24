<template>
<div>
    <h1>Gerenciamento de Serviços e Feedbacks</h1>

    <h2>Serviços</h2>
    <Services
        v-for="service in services.reverse()" :key="service.id" 
        v-bind:service="service"/>
</div>
</template>

<script>
import Services from './Services'
export default {
    name:'AdminPage',
    props:['user'],
    components:{
        Services
    },
    data(){
        return {
            services:[],
        }
    },
    methods:{
        async fetchServices() {
            let { data } = await axios.get('/api/services',{
                params:{
                    user_id:this.user.id,
                }
            });

            this.services = data.data;

        },
    },
    created() {
        this.fetchServices();
    }
}
</script>

<style>

</style>