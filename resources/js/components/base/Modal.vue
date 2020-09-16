<template>
    <div class="modal modal--cascade modal--max-height-100 " :id="modalId">
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
            <div class="row">
                <div class="col s12">
                    <ul class="left-align px-3">
                        <li v-for="error in errors" :key="error.title" class="error">
                            <i class="material-icons error--vertical-align">
                                error
                            </i>
                            {{ error[0] }}
                        </li>
                    </ul>
                    <a
                        class="btn btn--primary btn--gradient"
                        @click="handleClick"
                    >
                        Criar
                        <i class="material-icons right">{{ btnIconTxt }}</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    
    data(){
        return {
            errors: Array
        }
    },

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
