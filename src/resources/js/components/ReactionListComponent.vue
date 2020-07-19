<template>
    <ul class="reaction-list">
        <li
            v-for="reaction in reactions"
            :key="reaction[0].id"
            :class="['reaction',
                {'reaction--active': reaction[0].user_id == userId}
            ]"
            @click="del(reaction[0].id)"
        >
            <div class="reaction__icon">
                <i class="material-icons">
                    {{ reaction[0].text }}
                </i>
            </div>

            <div class="reaction__count">
                {{ reaction.length }}
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    data() {
        return {
            reactions: []
        }
    },

    props: [
        'itemId',
        'userId',
    ],

    methods: {
        handleClick(id) {
            if (this.userCreated) {
                this.delete(id);
            }
        },

        async del(id) {
            await window.axios.delete(`/api/reactions/${id}`);

            let index = this.reactions.findIndex(r => r[0].id == id);
            this.reactions.splice(index, 1);
        }
    },

    async created() {
        let reactionsData = await window.axios.get(`/api/reactions/${this.itemId}`);
        this.reactions = Object.values(reactionsData.data);
    }
}
</script>

<style scoped>

</style>
