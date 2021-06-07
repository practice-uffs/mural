<template>
    <div class="p-1 col-sm-15 col-md-4">
        <div class="my-service text-center" :class="service.status|status_class">

            <div class="w-100">
                <div class="col-sm-12 p-3 text-start w-100">
                    <p class="title mb-1"><strong>{{service.title}}</strong></p>
                    <p>{{service.description.substring(0,150)}} <i v-if="service.description.length > 150">...</i></p>
                </div>

                <div class="p-1 w-100">
                    <div class="col-12 mb-2 d-flex justify-center align-items-stretch flex-wrap">
                        <div class="d-flex flex-column justify-content-center item_box">
                            <div class="p-2">
                                <b>Id</b>
                            </div>
                            <div class="p-2">
                                {{service.id}}
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center item_box">
                            <div class="p-2">
                                <b>Categoria</b>
                            </div>
                            <div class="p-2">
                                {{service.specification_id}}
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center item_box">
                            <div class="p-2">
                                <b>Data</b>
                            </div>
                            <div class="p-2">
                                {{service.created_at | formatDate}}
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center item_box" v-if="service.delivery_date">
                            <div class="p-2">
                                <b>Data de Entrega</b>
                            </div>
                            <div class="p-2">
                                {{service.delivery_date | formatDate}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-100">
                <div class="d-flex flex-row justify-content-center w-100 p-2">
                    <div class="col-sm-6">
                        <a :href="'/servico/'+service.id+'/edit'">
                        <span class="material-icons col-12">grading</span>
                        Editar</a>
                    </div>
                    <div class="col-sm-6">
                        <a :href="'/servico/'+service.id">
                            <span class="material-icons">insert_comment</span>
                            <p>Acompanhar</p>
                        </a>
                    </div>
                </div>

                <div class="col-12 text-end text-muted p-2">
                    <small><i class="bi bi-alarm"></i> última atualização {{service.updated_at | prettyDate}}</small>
                </div>
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
    padding: 0px, 30px;
    height: 100%;

    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: space-between;
    align-content: center;
    align-items: center;
    word-wrap: break-word;
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
.item_box{
    flex: 1;
    min-width: 30%;
    min-height: 100px;
    border: 1px solid rgba(68, 68, 68, 0.25);
    border-radius: 8px;
    margin: 5px;
    word-wrap: break-word;
}

</style>
