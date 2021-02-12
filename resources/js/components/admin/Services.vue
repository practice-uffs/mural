<template>
   <div class="my-service  text-center">
        <div class="row">
            <a :href="service.github_issue_link" class="col-12">
                <img class="github-icon"
                    :class="{'inactive':!service.github_issue_link}"
                    :src="'/img/GitHub-Mark-64px.png'"
                    alt="link para a isssue no github" title="link para a isssue no github"
                >
            </a>
            <a :href="'/servico/'+service.id+'/edit'"
                class="p-2"
            >Editar</a>
        </div>   
        <div class="col-sm-11 col-md-5 text-start">
            <p><strong>{{service.title}} </strong><small>- atualizadada {{service.updated_at | prettyDate}}</small> </p>
            <p>{{service.description.substring(0,150)+"..." }}</p>
            <p><small>Categoria: {{service.specification_id}}, Localização: {{service.location_id}}</small></p>
            <p><small>Status: {{service.status|status}}</small></p>
        </div>
        <div>
            <p><strong>Usuario</strong></p>
            <p>{{service.user}}</p>
        </div>
        <div>
            <p><strong>Categoria</strong></p>
            <p>{{service.category_id}}</p>
        </div>
        <div>
            <p><strong>Data</strong></p>
            <p><small>{{service.created_at | formatDate}}</small></p>
        </div>
        <div>
            <p><strong>ID</strong></p>
            <p>{{service.id}}</p>
        </div>
        <a :href="'/servico/'+service.id" 
           class="col-sm-12 col-md-1">
            <span class="material-icons">insert_comment</span>
            <p><small>Acompanhar</small></p>
        </a>
    </div>
</template>

<script>
export default {
    name:'Services',
    props:['service'],

}
</script>

<style scoped>
.my-service{
    background-color: #f0f0f0;
    border-radius: 8px;
    padding: 30px;

    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    align-items: center;
    align-content: center;
    justify-content: space-around;
}
.my-service:hover{
    background-color: #ededed;
}
a, a:hover, a:visited, a:active{
    text-decoration: none;
}
.github-icon{
    width: 50px;
}
.inactive{
    filter: opacity(0.5);
}

</style>