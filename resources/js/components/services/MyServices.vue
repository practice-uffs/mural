<template>
   <div class="my-service row text-center p-3 m-3
               d-flex justify-content-around align-items-center">
        <span class="material-icons ">grading</span>
        <div class="col-sm-11 col-md-6 text-left">
            <p><strong>{{service.title}}</strong></p>
            <p>{{service.description.substring(0,150)+"..." }}</p>
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
            <p>Acompanhar</p>
        </a>
    </div>
</template>

<script>
export default {
    name:'MyServices',
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

</style>