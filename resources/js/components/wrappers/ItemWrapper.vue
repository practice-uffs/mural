<template>
    <main class="container">
        <div class="row" v-if="authUserId">
            <div class="col s12">
                <div class="card card--primary card--gradient white-text">
                    <div class="card-content">
                        <div class="card-title">
                            Possui alguma ideia ou deseja um serviço em especial?
                        </div>
                        Você pode facilmente reportar ideias, sugestões e reclamações. Serviços mais específicos também podem ser requisitados.
                    </div>

                    <div class="card-action">
                        <a href="#modalFeedback"
                            class="text-secondary modal-trigger"
                        >
                            Adicionar Feedback
                        </a>
                        <a href="#modalService"
                            class="text-secondary modal-trigger"
                        >
                            Solicitar Serviço
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <item-list 
            item-type=1
            user-id="authUserId"
        ></item-list>

        <div v-if="authUserId">
            <item-list 
                item-type=2 
                user-id="authUserId"
            ></item-list>
            <feedback-form
                modal-id="modalFeedback"
                user-id="authUserId"
            ></feedback-form>

            <service-form
                modal-id="modalService"
                user-id="authUserId"
            ></service-form>
        </div>
    </main>
    
</template>

<script>
export default {
    props: {
        authUserId: {
            type: String,
            default: null
        }
    }
    
}
</script>