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
            <a
                class="btn btn--primary btn--gradient"
                :class="{'modal-close' : btnIconTxt == 'close'}"
                @click="handleClick"
            >
                {{ btnActionTxt }}
                <i class="material-icons right">{{ btnIconTxt }}</i>
            </a>
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

        closeModal() {
            M.Modal.getInstance(
                document.getElementById(this.modalId)
            ).close();
        },

        initModal(){
            let modalElems = document.querySelectorAll(`#${this.modalId}`);
            M.Modal.init(modalElems, this.modalOptions);
        }
    },
    
    mounted(){
        this.initModal();
    }
}
</script>
