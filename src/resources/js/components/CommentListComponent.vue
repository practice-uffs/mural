<template>
    <div :class="['timeline',
        {'timeline--with-comment': userCommented}
    ]">

    </div>
</template>

<script>
export default {
    data() {
        return {
            comments: {},
        }
    },

    props: {
        'userCommented': Boolean,
    },

    methods: {
        list() {
            
        }
    }
}
</script>
