<template lang="">
    <div :id="listId">
        <div class="item-title">
            <h4>Lista de {{ itemName }} criados</h4>

            <a href="#" 
                    data-target="list-toggler" 
                    class="hide-on-small-only" 
                    @click="toggleListView"
            >
                <span class="material-icons">
                    view_list
                </span>
            </a>
        </div>

        <div class="row" data-toggle="toggle-list">
            <div class="col s12 m6 xl4"
                    v-for="item in items" 
                    v-bind="item"
                    :key="item.id"
            >
                <a :href="'/items/show' + item.id"
                    class="grey-text text-darken-4"
                >
                    <div class="card hoverable">
                        <div class="card-content">
                            <span class="card-title truncate">
                                {{ item.title }}
                            </span>
                            <p class="truncate grey-text text-darken-3">
                                {{ item.description }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
const FEEDBACK = '1';

export default {
    data() {
        return {
            items: [],
            listToggled: false
        }
    },

    props: {
        itemType: String
    },

    computed: {
        itemName() {
            return (this.itemType == FEEDBACK ? 'Feedbacks' : 'Serviços');
        },

        listId() {
            return (this.itemType == FEEDBACK ? 'feedbacks' : 'services');
        }
    },

    methods: {
        async fetchFeedbacks() {
            let { data } = await window.axios.get('/api/feedbacks');

            this.items = data.data;
        },

        async fetchServices() {
            let { data } = await window.axios.get('/api/services');

            this.items = data.data;
        },

        toggleListView(event) {
            let itemList = document.getElementById(this.listId);
            let listView = itemList.querySelector('[data-toggle="toggle-list"]');
            let triggerIcon = event.target;

            listView.querySelectorAll('div.col').forEach((elem) => {
                elem.classList.toggle('m6');
                elem.classList.toggle('xl4');
            });

            if (this.listToggled) {
                triggerIcon.innerHTML = 'view_list';

            } else {
                triggerIcon.innerHTML = 'view_module';
            }

            this.listToggled = !this.listToggled;
        }
    },

    mounted() {
        if (this.itemType == FEEDBACK) {
            this.fetchFeedbacks();
        
        } else {
            this.fetchServices();
        }
    },

    updated() {
        console.error(this.items);
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/variables';
@import '../../sass/functions';

.item-title {
    display: flex;
    align-items: center;
    justify-content: space-between;

    a {
        padding: 1rem;
        color: darken(theme-color('primary'), 5%);
        transition: all 0.3s;

        &:hover {
            background-color: transparent !important;
            color: darken(theme-color('primary'), 20%);
        }

        .material-icons {
            font-size: 2rem;
        }
    }
}
</style>