<template>
    <div class="modal modal--cascade" :id="modalId">
        <div class="modal-content">
            <div class="modal__header">
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
