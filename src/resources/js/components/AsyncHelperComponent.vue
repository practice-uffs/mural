<template>
    <div @click="send">
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: {
        "url": {
            type: String
        },

        "method": {
            type: String
        }
    },

    methods: {
        async send() {
            await window.axios({
                'url': this.url,
                'method': this.method
            });
        }
    }
}
</script>

<style scoped>

</style>
