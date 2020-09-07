<template>
    <div class="modal modal--popup" ref="loaderWrapper" :id="loaderId">
        <div class="modal-content">
            <h5 :class="['modal-title', type]">
                <i :class="['material-icons', `${type}--vertical-align`]">
                    {{titleIcon}}
                </i>
                {{title}}
            </h5>
            <div class="preloader-wrapper bigger active">
                <div class="spinner-layer spinner-blue-only">
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
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            instance: null
        }
    },

    props: {
        loaderId: null,
        title: null,
        type: {
            default: "warning"
        }
    },

    computed: {
        titleIcon() {
            if (this.type == "warning" || this.type == "error") {
                return this.type;
            
            } else if (this.type == "success") {
                return "check";
            }
        }
    },

    methods: {
        start() {
            this.instance.open();
        },

        finish() {
            this.instance.close();
        }
    },

    mounted() {
        let modal = document.querySelector(`#${this.loaderId}`);
        this.instance = M.Modal.init(modal);
    }
}
</script>
<style lang="scss" scoped>
@import '../../../sass/variables';
@import '../../../sass/functions';

.modal--popup {
    .modal-content {
        text-align: center;
    }

    .spinner-blue-only {
        border-color: color('blue');
    }

    .preloader-wrapper.bigger {
        width: 6rem;
        height: 6rem;

        .circle {
            border-width: 4px;
        }
    }
}
</style>