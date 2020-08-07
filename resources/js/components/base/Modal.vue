<template>
    <div class="modal" :id="modalId">
        <div class="modal-content">
            <h5 class="modal__title">
                {{ modalTitle }}
            </h5>

            <div class="modal__body">
                <slot></slot>    
            </div>
        </div>

        <div class="modal-footer">
            <a
                class="btn btn--primary btn--gradient"
                @click="handleClick"
            >
                {{ btnAction }}
                <i class="material-icons right">send</i>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        modalId: String,
        modalTitle: String,
        btnAction: String,
    },

    methods: {
        handleClick() {
            this.$emit('click');
        }
    }
}
</script>
