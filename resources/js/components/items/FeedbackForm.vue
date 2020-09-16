<template>
    <div>
        <base-modal
            :modal-id="modalId"
            :modal-title="modalTitle"
            :modal-options="modalOptions"
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
                            ref="title"
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

            title: '',
            categoryId: '',
            locationId: '',
            description: '',
            hidden: '',

            modalOptions: {
                onOpenEnd: this.focusOnTitleAndSwitchTab
            }
        }
    },

    props: {
        modalId: String,
        userId: String,
        context: Object
    },

    methods: {
        
        focusOnTitleAndSwitchTab: function() {
            document.querySelector('ul.tabs').M_Tabs.select('feedbacks');
            this.$refs.title.focus();
        },

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

        handleError(err){
            let data = err.response.data;
            this.$refs.modalWrapper.errors = data.errors;
        },

        handleSuccess(response){
            this.$refs.modalWrapper.closeModal();
            
            this.$emit('blank');
            
            this.resetData();
            
            setTimeout(function(){
                this.$emit('created', response.data);
            }.bind(this), 1000);
        },

        createFeedback() {
            let data = {
                'user_id': this.userId,
                'location_id': this.locationId,
                'category_id': this.categoryId,
                'title': this.title,
                'description': this.description,
                'hidden': !this.hidden,
            }

            window.axios.post('/api/feedbacks', data)
                .then(this.handleSuccess)
                .catch(this.handleError);
        },

        handleClick() {
            this.createFeedback();
        },

        resetData() {
            this.title = '';
            this.categoryId = '';
            this.locationId = '';
            this.description = '';
            this.hidden = '';
            this.$refs.modalWrapper.errors = [];
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
