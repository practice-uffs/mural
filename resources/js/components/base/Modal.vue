<template>
    <div class="modal" :id="modalId">
        <div class="modal-content">
            <div class="modal__header z-depth-3">
                <h5>
                    {{ modalTitle }}
                </h5>
            </div>

            <div class="modal__body">
                <slot></slot>
            </div>
        </div>

        <div class="modal-footer" ref="modalFooter">
            <a
                class="btn btn--primary btn--gradient"
                @click="handleClick"
            >
                {{ btnActionTxt }}
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
        btnActionTxt: String,
    },

    methods: {
        addLoader() {
            this.$refs.modalFooter.innerHTML = `
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

        resetBtn() {
            this.$refs.modalFooter.innerHTML = `
            <a
                class="btn btn--primary btn--gradient"
                ref="btnAction"
                @click="handleClick"
            >
                ${this.btnActionTxt}
                <i class="material-icons right">send</i>
            </a>
            `;
        },

        handleClick() {
            this.addLoader();
            this.$emit('click');
        },

        closeModal() {
            M.Modal.getInstance(
                document.getElementById(this.modalId)
            ).close();
        }
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables';
@import '../../../sass/_functions';

.modal {
    min-width: 70%;
    overflow: visible !important;

    .modal-content {
        position: relative;
    }
}

/**
 * Adjust content "top margin"
 */
.modal__header + .modal__body {
    padding-top: 4rem;
}

/**
 * Setup modal header cascade
 */
.modal__header {
    position: absolute;
    top: 0;
    left: 0;
    transform: translate(-1.5%, -50%);
    margin-bottom: 4rem;

    width: 103%;
    padding: 1rem;

    background-image: linear-gradient(35deg, gradient('primary'));
    color: theme-color('light');
    border-radius: $card-border-radius * 2;
}
</style>
