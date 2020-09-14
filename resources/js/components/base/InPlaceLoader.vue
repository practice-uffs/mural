<template>
    <div ref="contentWrapper">
        <slot></slot>
    </div>
</template>

<script>
export default {
    data() {
        return {
            originalContent: ''
        }
    },

    methods: {
        start() {
            this.originalContent = this.$refs.contentWrapper.innerHTML;
            
            let { width, height } = this.originalContent;
            this.$refs.contentWrapper.style.width = width;
            this.$refs.contentWrapper.style.height = height;

            this.$refs.contentWrapper.innerHTML = `
            <div class="preloader-wrapper small active">
                <div class="spinner-layer">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            `;
        },

        finish() {
            this.$refs.contentWrapper.innerHTML = this.originalContent;
        }
    }
}
</script>