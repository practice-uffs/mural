<template>
    <div>
        <base-modal
            :modal-id="modalId"
            :modal-title="modalTitle"
            :btn-action-txt="btnActionTxt"
            @click="handleClick"
            ref="modalWrapper"
        >
            <input type="text" name="type" value="1" class="hide">

            <div class="row">
                <div class="col m6 s12">
                    <div class="input-field">
                        <label for="title">Título</label>
                        <input
                            type="text"
                            name="title"
                            v-model="title"
                        />
                        <span class="helper-text">Ex.: Jogos digitais em aula</span>
                    </div>
                </div>

                <div class="col m3 s12">
                    <div class="input-field">
                        <select name="category_id" id="category_id" v-model="categoryId">
                            <option value="" disabled selected>Selecione uma categoria</option>

                            <option v-for="category in categories"
                                :key="category.id"
                                :value="category.id"
                            >{{ category.name }}</option>
                        </select>
                        <label>Categoria</label>
                    </div>
                </div>

                <div class="col m3 s12">
                    <div class="input-field">
                        <select name="location_id" id="location_id" v-model="locationId">
                            <option value="" disabled selected>Selecione um local</option>

                            <option v-for="location in locations"
                                :value="location.id"
                                :key="location.id"
                            >{{ location.name }}</option>
                        </select>

                        <label>Local de realização</label>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col m12 s12">
                    <div class="input-field">
                        <label for="description">Descrição</label>
                        <textarea
                            class="materialize-textarea"
                            id="description"
                            name="description"
                            v-model="description"
                            rows="8"
                            data-length="800"
                        ></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col m7 s12 text-right">
                    <div class="switch">
                        Esse item ficará visível para todos?
                        <label>
                            Não
                            <input
                                type="checkbox"
                                name="hidden"
                                v-model="hidden"
                            >
                            <span class="lever"></span>
                            Sim
                        </label>
                    </div>
                </div>
            </div>
        </base-modal>

        <popup-loader ref="loader" loader-id="feedbackLoader" title="Aguarde enquanto criamos seu feedback"></popup-loader>
    </div>
</template>

<script>
const FEEDBACK = 1;

export default {
    data: function() {
        return {
            categories: null,
            locations: null,

            modalTitle: 'Adicionar um Feedback',
            btnActionTxt: 'Criar',

            title: '',
            categoryId: '',
            locationId: '',
            description: '',
            hidden: '',
        }
    },

    props: {
        modalId: String,
        userId: String,
    },

    methods: {
        async loadCategories() {
            /**
             * Fetch the categories corresponding to the given item_type.
             */

            let { data } = await window.axios.get('/api/categories', {
                params: {
                    'item_type': FEEDBACK,
                }
            });

            this.categories = data;
        },

        async loadLocations() {
            /**
             * Fetch all locations.
             */

            let { data } = await window.axios.get('/api/locations');

            this.locations = data;
        },

        async createFeedback() {
            let data = {
                'user_id': this.userId,
                'location_id': this.locationId,
                'category_id': this.categoryId,
                'title': this.title,
                'description': this.description,
                'hidden': !this.hidden,
            }

            await window.axios.post('/api/feedbacks', data).then(function(response) {
                console.log(response);
            });
        },

        async handleClick() {
            this.$refs.modalWrapper.closeModal();
            this.$refs.loader.start();

            await this.createFeedback();

            this.$refs.loader.finish();

            this.resetData();

            window.location.href = '/items';
        },

        resetData() {
            this.title = '';
            this.categoryId = '';
            this.locationId = '';
            this.description = '';
            this.hidden = '';
        },

        setDropdownSelect() {
            var selectElems = document.querySelectorAll(`#${this.modalId} select`);
            M.FormSelect.init(selectElems);
        }
    },

    created() {
        this.loadLocations();
        this.loadCategories();
    },

    updated() {
        this.setDropdownSelect();
    }

}
</script>
