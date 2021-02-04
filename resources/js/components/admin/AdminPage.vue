<template>
<div>
    <h1>Gerenciamento de Serviços</h1>

    <h2>Serviços</h2>
    <Services
        v-for="service in services" :key="service.id" 
        v-bind:service="service"/>
</div>
</template>

<script>
import Services from './Services'
export default {
    name:'AdminPage',
    props:['user','token'],
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
                headers:{
                    'Authorization': `Bearer ${this.token.access_token}`
                },
                params:{
                    user_id:this.user.id,
                }
            });

            this.services = data.data.reverse();

        },
    },
    created() {
        this.fetchServices();
    }
}
</script>

<style>

</style>