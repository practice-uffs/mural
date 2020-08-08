<template>
    <div id="service-form" class="modal modal--overflow-y-visible">
        <div class="modal-header">
            <div class="mt-1">
                <h5>
                    Qual serviço você precisa?
                </h5>
            </div>
        </div>

        <div class="modal-content">
            <div class="row">
                <div class="col m8 s12">
                    <div class="input-field">
                        <label for="title">Título</label>
                        <input
                            type="text"
                            name="title"
                            placeholder="Ex.: Jogos digitais em aula"
                            v-model="title"
                            ref="title"
                        />
                    </div>
                </div>

                <div class="col m4 s12">
                    <div class="input-field">
                        <select name="category_id" id="category_id" v-model="category">
                            <option value="" disabled selected> Selecione uma categoria</option>
                            <option v-for="category in categoriesArray"
                                :key="category.id"
                                :value="category.id"
                            >{{ category.name }}</option>
                        </select>
                        <label>Categoria</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col m4 s12">
                    <div class="input-field">
                        <select name="location_id" id="location_id" v-model="location">
                            <option value="" disabled selected>Selecione um local</option>
                            <option v-for="location in locationsArray"
                                :key="location.id"
                                :value="location.id"
                            >{{ location.name }}</option>
                        </select>
                        <label>Local de realização</label>
                    </div>
                </div>

                <div class="col m8 s12">
                    <div class="input-field">
                        <label for="description">Descrição</label>
                        <textarea
                            class="materialize-textarea"
                            id="description"
                            name="description"
                            rows="8"
                            data-length="800"
                            v-model="description"
                        ></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col m9 s12">
                    <ul class="left">
                        <li v-if="!success" class="warning">
                            <i class="material-icons warning--vertical-align">
                                warning
                            </i>
                            Esse serviço ficará visível somente a você e a equipe do Practice.
                        </li>
                        <li v-for="error in errors" :key="error.title" class="error">
                            <i class="material-icons error--vertical-align">
                                error
                            </i>
                            {{ error[0] }}
                        </li>
                        <li v-if="success" class="success">
                            <i class="material-icons success--vertical-align">
                                check
                            </i>
                            {{ success }}
                        </li>
                    </ul>
                </div>
                <div class="col m3 s12">

                    <button
                        type="submit"
                        class="btn btn-waves btn--primary btn--gradient my-2 right"
                        :class="{'modal-close' : success}"
                        @click="create"

                    >
                        {{ success ? 'Fechar' : 'Criar' }}
                        <i class="material-icons right">
                            {{ success ? 'close' : 'send' }}
                        </i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

const SERVICE = 2;

export default {

    data(){
        return {
            category: "",
            location: "",
            description: "",
            title: "",
            errors: {},
            success: ""
        }
    },
    props: {
        url: String,
        categories: String,
        locations: String
    },
    methods: {

        setupModal(){
            let options = {
                onOpenEnd: this.focusOnTitle,
                onCloseStart: this.clearSuccessMessage,
                inDuration: 350
            }
            let modal = document.querySelector('#service-form');
            M.Modal.init(modal, options);
        },

        focusOnTitle: function() {
            this.$refs.title.focus();
        },

        clearSuccessMessage(){
            this.success = "";
        },

        handleError(err){
            let data = err.response.data;
            this.errors = data.errors;
        },

        handleSuccess(response){
            this.success = response.data.message;
            this.resetData();
        },

        create(){
            if(!this.success){
                this.errors = {};

                let data = {
                    'type': SERVICE,
                    'title': this.title,
                    'description': this.description,
                    'hidden': 'on',
                    'location_id': this.location,
                    'category_id': this.category,
                };

                let promise = window.axios.post(this.url, data);
                promise.then(this.handleSuccess)
                .catch(this.handleError);
            }
        },
        resetData(){
            this.title = "";
            this.category = "";
            this.location = "";
            this.description = "";
        },

    },
    computed: {
        categoriesArray() {
            return JSON.parse(this.categories);
        },
        locationsArray(){
            return JSON.parse(this.locations);
        }
    },
    mounted(){
        this.setupModal();
    }
}
</script>

<style lang="scss">

    @import "../../sass/variables";

    $row-offset-padding: 0.75rem;
    $type-messages: (success $green, warning $yellow, error $red);

    .modal {
        max-height: 100% !important;
    }

    .modal--overflow-y-visible {
        overflow-y: visible;
    }

    .modal-header {
        padding: 12px calc(24px + #{$row-offset-padding}) 0 calc(24px + #{$row-offset-padding});
    }

    .row--bt-0 {
        margin-bottom: 0 !important;
    }

    @each $type in $type-messages {
        .#{nth($type, 1)} {
            color: nth($type, 2);

            &--vertical-align{
                vertical-align: bottom;
            }
        }
    }

</style>
