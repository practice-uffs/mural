<template>
    <ul class="reaction-list">
        <li
            v-for="reaction in reactions"
            v-bind="reaction"
            :key="reaction.id"
            :class="['reaction',
                {'reaction--active': reaction.userCreated}
            ]"
            @click="del(reaction)"
        >
            <div class="reaction__icon">
                <img :src="'/img/reactions/' + reaction.text">
            </div>

            <div class="reaction__count">
                {{ reaction.count }}
            </div>
        </li>

        <div v-if="!userCreatedAny && userId">
            <a class="dropdown-trigger reaction__btn btn-floating"
                href="#!"
                :data-target="reactionsId"
            >
                <i class="material-icons">add</i>
            </a>

            <ul :id='reactionsId' class='dropdown-content'>
                <li 
                    v-for="img in allReactionsIcons"
                    :key="img">
                    <a href="#!" @click="create(img)">
                        <img :src="'/img/reactions/' + img" class="">
                    </a>
                </li>
            </ul>
        </div>
    </ul>
</template>

<script>

export default {
    data: function () {
        return {
            reactions: {},
            userCreatedAny: false
        }
    },

    props: {
        'itemId': [String, Number],
        'userId' : {
            default: null
        }
    },

    methods: {
        async fetchReactions() {
            let reactionsData = await window.axios.get(`/api/reactions/${this.itemId}`);

            let reactions = {};

            for (let reaction of reactionsData.data) {
                let userCreated = (reaction.user_id == this.userId);

                if (reaction.text in reactions) {
                    reactions[reaction.text].count += 1;

                } else {
                    reactions[reaction.text] = {
                        text: reaction.text,
                        count: 1,
                        id: reaction.id,
                    };
                }

                if (userCreated) {
                    reactions[reaction.text].userCreated = true;
                    reactions[reaction.text].id = reaction.id;
                    this.userCreatedAny = true;
                    
                }
            }

            this.reactions = reactions;
        },

        async del(reaction) {
            if (!reaction.userCreated) return;

            let reactions = this.reactions;

            await window.axios.delete(`/api/reactions/${reaction.id}`);

            if (reaction.count > 1) {
                reactions[reaction.text].count--;
                reactions[reaction.text].userCreated = false;
                this.reactions = reactions;

            } else {
                Vue.delete(this.reactions, reaction.text);
            }

            this.userCreatedAny = false;
        },

        async create(text) {
            let reaction = await window.axios.post('/api/reactions', {
                'text': text,
                'user_id': this.userId,
                'item_id': this.itemId
            });

            this.fetchReactions();
        }
    },

    computed: {
        reactionsId: function() {
            return 'reactions' + this.itemId + this.userId;
        },

        allReactionsIcons: function() {
            return [
                '1F44D.svg',
                '1F44E.svg',
                '1F389.svg',
                '1F440.svg',
                '1F604.svg',
                '1F615.svg',
                '1F680.svg',
                '2764.svg',
            ];
        }
    },

    created() {
        this.fetchReactions();
    },

    updated() {
        let dropdownElems = document.querySelectorAll('.reaction__btn');
        M.Dropdown.init(dropdownElems);
    }
}
</script>

<style scoped>

</style>
