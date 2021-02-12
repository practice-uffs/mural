<template>
   <div class="my-service text-center">
        <div>
            <span class="material-icons col-12">grading</span>
            <a :href="'/servico/'+service.id+'/edit'"
                class="p-2"
            >Editar</a>
        </div>
        <div class="col-sm-11 col-md-6 text-start">
            <p><strong>{{service.title}}</strong></p>
            <p>{{service.description.substring(0,150)+"..." }}</p>
            <small><p class="pt-0">Status: {{service.status|status}}</p></small>
        </div>
        <div>
            <p><strong>Categoria</strong></p>
            <p>{{service.category_id}}</p>
        </div>
        <div>
            <p><strong>Data</strong></p>
            <p>{{service.created_at | formatDate}}</p>
        </div>
        <div>
            <p><strong>ID</strong></p>
            <p>{{service.id}}</p>
        </div>
        <div>
            <a :href="'/servico/'+service.id" 
            class="text-center col-sm-12 col-md-2">
                <span class="material-icons">insert_comment</span>
                <p>Acompanhar</p>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name:'MyServices',
    props:['service'],

}
</script>

<style scoped>
.my-service{
    background-color: #f0f0f0;
    border-radius: 8px;
    padding: 30px;

    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
    align-content: center;
    align-items: center;
}
.my-service:hover{
    background-color: #ededed;
}
a, a:hover, a:visited, a:active{
    text-decoration: none;
}

</style>