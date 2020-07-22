<template>
    <div id="timeline" class="timeline">
        <ul class="timeline__list">
            <li
                v-for="comment in comments"
                v-bind="comment"
                :key="comment.id"
                class="timeline__item"
            >
                <div class="timeline__icon">
                </div>

                <div class="timeline__content">
                    <div class="timeline__title">
                        {{ comment.user | capitalize }}
                        <span>
                            {{ comment.date }}
                        </span>
                    </div>


                    <div class="timeline__text">
                        {{ comment.text }}
                    </div>

                    <div class="timeline__reactions">
                        <ul class="reaction-list">
                            <li class="reaction">
                                <div class="reaction__icon">
                                    <i class="material-icons">error_outline</i>
                                </div>

                                <div class="reaction__count">
                                    5
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>

        <div
            class="card timeline__card"
        >
            <div class="card-content">
                <div class="card-title">
                    Adicionar Comentário
                </div>
                <div class="input-field">
                    <textarea
                        class="materialize-textarea"
                        id="userComment"
                        name="userComment"
                        v-model="userComment"
                        rows="8"
                    ></textarea>
                </div>

                <div class="card-action">
                    <a
                        class="btn btn-primary right"
                        @click="createComment"
                    >
                        Comentar
                    </a>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            comments: [],

            userComment: '',
        }
    },

    props: [
        'userId',
        'itemId',
    ],

    methods: {
        async fetchComments() {
            /**
             *
             */

            let { data } = await window.axios.get(`/api/items/${this.itemId}/comments`);

            this.comments = data.data;
        },

        async createComment() {
            let comment = await window.axios.post(`/api/items/${this.itemId}/comments`, {
                'user_id': this.userId,
                'text': this.userComment
            });

            this.comments.push(comment.data);

        },

        adjustLastItemPosition() {
            if (typeof this.comments !== 'undefined' && this.comments.length > 0) {
                let lastItem = document.querySelector('#timeline .timeline__item:last-child');
                let padding = lastItem.querySelector('.timeline__content').offsetHeight;
                //
                // // if (this.userCommented) {
                // //     lastItem.style.marginBottom = padding + 'px';
                // //
                // // } else {
                    lastItem.style.paddingBottom = padding * 1.3 + 'px';
                // }

            } else {
                document.querySelector('#timeline .timeline__card').style.marginTop = '4rem';
            }
        }
    },

    computed: {
        // userCommented: function() {
        //     return this.comments.find(comment => {
        //         return comment.user_id == this.userId
        //     });
        // }
    },

    filters: {
        capitalize: function (value) {
            return value.replace(/\w\S*/g, function (txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
        }
    },

    created() {
        this.fetchComments();
    },

    updated() {
        this.adjustLastItemPosition();
    }
}
</script>
