<template>
    <div class="p-1 col-sm-12 col-md-4">
        <div class="my-service text-center " :class="service.status|status_class">
            <div class="d-flex justify-content-end col-12">
                <span v-if="!service.github_issue_link && service.status == 4" 
                    class="status-tag recusado">{{service.status | status_tag}}</span>
                <span v-if="!service.github_issue_link && service.status != 4"
                    class="status-tag aguardando">{{1 | status_tag}}</span>
                <span v-if="service.github_issue_link" class="status-tag"
                    :class="service.status|status_class">{{service.status | status_tag}}</span>
            </div>
            <div class="col-sm-12 text-start">
                <p><strong>{{service.title}}</strong></p>
                <p>{{service.description.substring(0,150)+"..." }}</p>
            </div>

            <table class="col-12 mb-2">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Categoria</th>
                    <th>Data</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{service.id}}</td>
                    <td>{{service.specification_id}}</td>
                    <td>{{service.created_at | formatDate}}</td>
                </tr>
                </tbody>
            </table>

            <div class="col-12 mt-3 row">
                <div class="col-sm-6">
                    <span class="material-icons col-12">grading</span>
                    <a :href="'/servico/'+service.id+'/edit'"
                        class="p-2"
                    >Editar</a>
                </div>
                <div class="col-sm-6">
                    <a :href="'/servico/'+service.id">
                        <span class="material-icons">insert_comment</span>
                        <p>Acompanhar</p>
                    </a>
                </div>
            </div>

            <div class="col-12 text-end text-muted "> 
                <small><i class="bi bi-alarm"></i> última atualização {{service.updated_at | prettyDate}}</small>
            </div>
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
    border-left: 5px solid;
    border-radius: 8px;
    padding: 30px;
    height: 100%;

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

.aguardando{
    border-color: #ff660098;
    transition: 0.3s;
}
.progresso{
    border-color: #0066ff98;
    transition: 0.3s;
}
.concluido{
    border-color: #17c40098;
    transition: 0.3s;
}
.recusado{
    border-color: #ff000098;
    transition: 0.3s;
}
.aguardando:hover{
    border-color: #ff6600;
    transition: 0.3s;
}
.progresso:hover{
    border-color: #0066ff;
    transition: 0.3s;
}
.concluido:hover{
    border-color: #17c400;
    transition: 0.3s;
}
.recusado:hover{
    border-color: #ff0000;
    transition: 0.3s;
}

.status-tag {
    border-radius: 30px;
    width: fit-content;
    font-size: .9rem;
    padding: 3px 8px;
    color: #fff;
}
.status-tag.aguardando {
    background-color: #ff660098;
}
.status-tag.progresso {
    background-color: #0066ff98;
}
.status-tag.concluido {
    background-color: #009933;
}
.status-tag.recusado {
    background-color: #ff000098;
}
</style>