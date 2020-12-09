<template>
   <div class="my-service row text-center p-3 m-3
               d-flex justify-content-around align-items-center">
        <a :href="service.github_issue_link">
            <img class="github-icon"
                 :class="{'inactive':!service.github_issue_link}"
                 :src="'/img/GitHub-Mark-64px.png'"
                 alt="link para a isssue no github" title="link para a isssue no github"
            >
        </a>
        <div class="'col-sm-11 col-md-6 text-left">
            <p><strong>{{service.title}} </strong><small>- atualizadada {{service.updated_at | prettyDate}}</small> </p>
            <p>{{service.description.substring(0,150)+"..." }}</p>
            <p><small>Categoria: {{service.specification_id}}, Localização: {{service.location_id}}</small></p>
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
            <p>{{service.created_at | formatDate}}</p>
        </div>
        <div>
            <p><strong>ID</strong></p>
            <p>{{service.id}}</p>
        </div>
        <a :href="'/servico/'+service.id" 
           class="row col-sm-12 col-md-1 
                  justify-content-center ">
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

<style>
.my-service{
    -webkit-box-shadow: 0px 0px 4px -1px #636363;
    -moz-box-shadow: 0px 0px 4px -1px #636363;
    box-shadow: 0px 0px 4px -1px #636363;
    background-color: #f0f0f0;
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