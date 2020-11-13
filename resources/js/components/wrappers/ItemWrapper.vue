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
            :items="feedbacks"
        ></item-list>

        <div v-if="authUserId">
            <item-list
                item-type=2
                user-id="authUserId"
                :items="services"
            ></item-list>

            <feedback-form
                modal-id="modalFeedback"
                :user-id="authUserId"
                @blank="createBlankFeedback"
                @created="createFeedback"
            ></feedback-form>

            <service-form
                modal-id="modalService"
                :user-id="authUserId"
                @blank="createBlankService"
                @created="createService"
            ></service-form>
        </div>
    </main>

</template>

<script>
export default {
    data() {
        return {
            feedbacks: [],
            services: []
        }
    },

    props: {
        authUserId: {
            type: String,
            default: null
        }
    },

    methods: {
        async fetchFeedbacks() {
            let { data } = await window.axios.get('/api/feedbacks');

            this.feedbacks = data.data;
        },

        async fetchServices() {
            let { data } = await window.axios.get('/api/services', {
                params: {
                    user_id: this.authUserId
                }
            });

            this.services = data.data;
        },

        createBlankFeedback() {
            this.feedbacks.unshift({
                _blank: true,
                id: "_blank"
            });
        },

        createBlankService() {
            this.services.unshift({
                _blank: true,
                id: "_blank"
            });
        },

        createFeedback(feedback) {
            this.$set(this.feedbacks, 0, feedback);
        },

        createService(service) {
            this.$set(this.services, 0, service);
        }
    },

    created() {
        this.fetchFeedbacks();

        if (this.authUserId) {
            this.fetchServices();
        }
    }

}
</script>