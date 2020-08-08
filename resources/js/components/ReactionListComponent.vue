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
                <i class="material-icons">
                    {{ reaction.text }}
                </i>
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
                <li><a href="#!" @click="create('thumb_up')">
                    <i class="material-icons">thumb_up</i>
                </a></li>

                <li><a href="#!" @click="create('thumb_down')">
                    <i class="material-icons">thumb_down</i>
                </a></li>
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
        }
    },

    created() {
        this.fetchReactions();
    },

    updated() {
        let dropdownElems = document.querySelectorAll('.dropdown-trigger');
        M.Dropdown.init(dropdownElems);
    }
}
</script>

<style scoped>

</style>
