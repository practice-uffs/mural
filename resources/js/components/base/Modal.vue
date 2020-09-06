<template>
    <div class="modal modal--cascade" :id="modalId">
        <div class="modal-content pb-0">
            <div class="modal__header">
                <h5>
                    {{ modalTitle }}
                </h5>
            </div>

            <div class="modal__body">
                <slot></slot>
            </div>
        </div>

        <div class="modal-footer">
            <in-place-loader ref="loader">
                <a
                    class="btn btn--primary btn--gradient"
                    :class="{'modal-close' : btnIconTxt == 'close'}"
                    @click="handleClick"
                >
                    {{ btnActionTxt }}
                    <i class="material-icons right">{{ btnIconTxt }}</i>
                </a>
            </in-place-loader>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        modalOptions: {},
        modalId: String,
        modalTitle: String,
        btnActionTxt: String,
        btnIconTxt: {
            type: String,
            default: "send"
        }
    },

    methods: {
        handleClick() {
            this.$emit('click');
        },

        addLoader() {
            this.$refs.loader.start();
        },

        resetBtn() {
            this.$refs.loader.finish();
        },

        closeModal() {
            M.Modal.getInstance(
                document.getElementById(this.modalId)
            ).close();
        },

        initModal(){
            var modalElems = document.querySelectorAll(`#${this.modalId}`);
            M.Modal.init(modalElems, this.modalOptions);
        }
    },
    
    mounted(){
        this.initModal();
    }
}
</script>
