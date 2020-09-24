<template>
    <div>
        <base-modal
            modal-title="Qual Serviço você precisa?"
            :modal-id="modalId"
            :modal-options="modalOptions"
            @click="create"
            ref="modalWrapper"
        >
            <div class="row">
                <div class="col m6 s12">
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

                <div class="col m3 s12">
                    <div class="input-field">
                        <select name="category_id" id="category_id" v-model="categoryId">
                            <option value="" disabled selected> Selecione uma categoria</option>
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
                                :key="location.id"
                                :value="location.id"
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
                            rows="8"
                            data-length="800"
                            v-model="description"
                        ></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col m12 s12">
                    <ul class="left">
                        <li class="warning">
                            <i class="material-icons warning--vertical-align">
                                warning
                            </i>
                            Discussões e informações relativas ao andamento do
                            serviço ficarão visíveis somente a você e aos membros
                            do Practice.
                        </li>
                    </ul>
                </div>
            </div>
        </base-modal>
    </div>
</template>

<script>
const SERVICE = 2;

export default {

    data(){
        return {
            categories: null,
            locations: null,

            categoryId: '',
            locationId: '',
            description: '',
            title: '',
            
            modalOptions: {
                onOpenEnd: this.focusOnTitleAndSwitchTab
            },

            success: ''
        }
    },
    
    props: {
        modalId: String,
        userId: String
    },

    methods: {
        
        focusOnTitleAndSwitchTab: function() {
            document.querySelector('ul.tabs').M_Tabs.select('services');
            this.$refs.title.focus();
        },

        async loadCategories() {
            let { data } = await window.axios.get('/api/categories', {
                params: {
                    'item_type': SERVICE,
                }
            });

            this.categories = data;
        },

        async loadLocations() {
            let { data } = await window.axios.get('/api/locations');
            
            this.locations = data;
        },

        handleError(err) {
            let data = err.response.data;
            this.$refs.modalWrapper.errors = data.errors;
        },

        handleSuccess(response) {
            this.$refs.modalWrapper.closeModal();
            
            this.$emit('blank');
            
            this.resetData();
            
            this.$emit('created', response.data);
        },

        async create() {
            
            let data = {
                'user_id': this.userId,
                'title': this.title,
                'description': this.description,
                'hidden': true,
                'location_id': this.locationId,
                'category_id': this.categoryId,
            };

            try {
                let response = await window.axios.post('/api/services', data);
                this.handleSuccess(response);
            }
            catch(err) {
                this.handleError(err);
            }
        },

        resetData() {
            this.title = '';
            this.categoryId = '';
            this.locationId = '';
            this.description = '';
            this.$refs.modalWrapper.errors = [];
        },

        setDropdownSelect() {
            var selectElems = document.querySelectorAll(`#${this.modalId} select`);
            M.FormSelect.init(selectElems);
        }
    },

    created() {
        this.loadCategories();
        this.loadLocations();
    },

    updated() {
        this.setDropdownSelect();
    }
}
</script>

<style lang="scss">

    @import "../../../sass/variables";

    $type-messages: (warning $yellow, error $red);

    @each $type in $type-messages {
        .#{nth($type, 1)} {
            color: nth($type, 2);

            &--vertical-align{
                vertical-align: bottom;
            }
        }
    }

</style>
