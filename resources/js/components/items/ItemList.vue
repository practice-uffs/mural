<template lang="">
    <div :id="listId" v-if="items">
        <div class="item-title">
            <h4>Lista de {{ itemName }} criados</h4>

            <a href="#!" 
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
                    :item="item"
                    :key="item.id"
            >
                <a :href="'/items/' + item.id"
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

                            <div class="user-info pt-3 pl-3">
                                <img 
                                    :src="'img/avatars/avatar-' + (Number(item.user_id) % 4 + 1) + '.png'"
                                    height="45" 
                                    class="user-info__avatar" 
                                    alt="Avatar"
                                >

                                <div class="user-info__uid-name px-2">
                                    <div>
                                        {{ item.user.name }}
                                    </div>
                                    <div class="pl-2">
                                        {{ item.user.uid }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card__reaction">
                            <reaction-list
                                :item-id="item.id"
                                :user-id="userId"
                                static-list
                            ></reaction-list>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div v-else>
        <h4>Você ainda não criou nenhum serviço</h4>
    </div>
</template>

<script>
const FEEDBACK = '1';

export default {
    data() {
        return {
            items: [],
            listToggled: false,
            user: {}
        }
    },

    props: {
        itemType: String,
        userId: {
            type: String,
            default: null
        }
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
            let { data } = await window.axios.get('/api/services', {
                params: {
                    user_id: this.userId
                }
            });

            this.items = data.data;
        },

        toggleListView(event) {
            let itemList = document.getElementById(this.listId);
            let listView = itemList.querySelector('[data-toggle="toggle-list"]');
            let triggerIcon = itemList.querySelector('[data-target="list-toggler"] span');

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

    created() {
        if (this.itemType == FEEDBACK) {
            this.fetchFeedbacks();
        
        } else {
            this.fetchServices();
        }
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables';
@import '../../../sass/functions';

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