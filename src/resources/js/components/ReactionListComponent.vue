<template>
    <ul class="reaction-list">
        <li
            v-for="reaction in reactions"
            :key="reaction.id"
            :class="['reaction',
                {'reaction--active': reaction.userCreated}
            ]"
            @click="handleClick(reaction)"
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
    </ul>
</template>

<script>
export default {
    data() {
        return {
            reactions: {},
        }
    },

    props: [
        'itemId',
        'userId',
    ],

    methods: {
        handleClick(reaction) {
            if (reaction.userCreated) {
                this.del(reaction);
            }
        },

        async del(reaction) {
            let reactions = this.reactions;

            await window.axios.delete(`/api/reactions/${reaction.id}`);

            if (reaction.count > 1) {
                reactions[reaction.text].count--;
                reactions[reaction.text].userCreated = false;
                this.reactions = reactions;

            } else {
                Vue.delete(this.reactions, reaction.text);
            }
        }
    },

    async created() {
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
            }
        }

        this.reactions = reactions;
    }
}
</script>

<style scoped>

</style>
