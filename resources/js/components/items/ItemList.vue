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
            <template v-for="(item, index) in items">
                <div class="col s12 m6 xl4" :item="item" :key="item.id">
                    <a :href="'/items/' + item.id"
                        class="grey-text text-darken-4"
                    >
                        <div class="card content-loader" v-if="item._blank">
                            <div class="card-content">
                                <div class="content-loader__title">
                                </div>

                                <div class="content-loader__description">
                                </div>

                                <div class="content-loader__user-info">
                                    <div class="content-loader__user-img">
                                    </div>

                                    <div class="content-loader__user-name">
                                    </div>
                                </div>
                            </div>

                            <div class="content-loader__reaction-list">
                                <div class="content-loader__reaction-item">
                                </div>

                                <div class="content-loader__reaction-item">
                                </div>
                            </div>
                        </div>
                        
                        <!-- CARD DOS ITENS DO FEEDBACK -->
                        <div class="card hoverable" v-else>
                            <div class="card-content row">
                                
                                 <div>
                                    <span class="card-title truncate">
                                        {{ item.title}}
                                    </span>
                                    <p v-if="item.description.lenght < 200" class="truncate grey-text text-darken-3">{{ item.description.substring(0,200)+'...'}} </p>
                                    <p v-else class="truncate grey-text text-darken-3">{{ item.description}} </p>
                                </div>
                            
                                 <div>
                                    <span class="card-title truncate">
                                        Categoria
                                    </span>
                                    <p class="truncate grey-text text-darken-3">{{ item.category_id}} </p>
                                </div>
                            
                                 <div>
                                    <span class="card-title truncate">
                                        Data
                                    </span>
                                    <p class="truncate grey-text text-darken-3">{{ item.created_at | formatDate }} </p>
                                </div>

                                 <div>
                                    <span class="card-title truncate">
                                        ID
                                    </span>
                                    <p class="truncate grey-text text-darken-3">{{ item.id}} </p>
                                </div>

                                    
                                <!-- USUÁEIO QUE SOLICITOU O SERVIÇO -->
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
                <div v-if="!((index+1) % 3)" class="clearfix hide-on-med-and-down">
                </div>
            </template>
        </div>
    </div>

    <div v-else>
        <h4>Você ainda não criou nenhum serviço</h4>
    </div>
</template>

<script>
import moment from 'moment'

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY')
    }
});

const FEEDBACK = '1';

export default {
    data() {
        return {
            listToggled: false,
            user: {}
        }
    },

    props: {
        itemType: String,
        userId: {
            type: String,
            default: null
        },
        items: Array
    },

    computed: {
        formatted(){
            return Vue.filter('date')(this.value)
        },
        itemName() {
            return (this.itemType == FEEDBACK ? 'Feedbacks' : 'Serviços');
        },

        listId() {
            return (this.itemType == FEEDBACK ? 'feedbacks' : 'services');
        }
    },

    methods: {
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