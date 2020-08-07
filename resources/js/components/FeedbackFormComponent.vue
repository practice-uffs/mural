<template>
    <base-modal
        :modal-id="modalId"
        :modal-title="modalTitle"
        :btn-action-txt="btnActionTxt"
    >
        <input type="text" name="type" value="1" class="hide">

        <div class="row">
            <div class="col m6 s12">
                <div class="input-field">
                    <label for="title">Título</label>
                    <input
                        type="text"
                        name="title"
                        placeholder="Ex.: Jogos digitais em aula"
                    />
                </div>
            </div>

            <div class="col m3 s12">
                <div class="input-field">
                    <select name="category_id" id="category_id">
                        <option value="" disabled selected>Selecione uma categoria</option>
                        <!-- @foreach ($categoriesFeedback as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                        @endforeach -->
                    </select>
                    <label>Categoria</label>
                </div>
            </div>

            <div class="col m3 s12">
                <div class="input-field">
                    <select name="location_id" id="location_id" v-model="location">
                        <option value="" disabled selected>Selecione um local</option>

                        <option v-for="location in locations"
                            :value="location.id"
                            :key="location.id"
                        >
                            {{ location.name }}
                        </option>
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
                        >
                        <span class="lever"></span>
                        Sim
                    </label>
                </div>
            </div>
        </div>
    </base-modal>
</template>

<script>
export default {
    data: function() {
        return {
            categories: [],
            locations: [],
            location: '',
        }
    },

    props: {
        modalId: String,
        modalTitle: String,
        btnActionTxt: String,
        userId: String,
    },

    methods: {
        async loadCategories() {
            let { data } = await window.axios.get('/api/categories', {
                params: {
                    'item_type': '1',
                }
            });

            this.categories = data;
        },

        async loadLocations() {
            let { data } = await window.axios.get('/api/locations');

            this.locations = data;
        }
    },

    created() {
        this.loadLocations();
        this.loadCategories();
    },

}
</script>
