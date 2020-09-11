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
                            {{ comment.date | formatDate }}
                        </span>
                    </div>


                    <div class="timeline__text">
                        {{ comment.text }}
                    </div>

                    <div class="timeline__reactions">
                        <reaction-list
                            :user-id="userId"
                            :item-id="comment.id"
                        >
                        </reaction-list>
                    </div>
                </div>
            </li>
        </ul>

        <div
            class="card timeline__card"
            v-if="userId"
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
                    <in-place-loader ref="loader">
                        <a
                            class="btn btn--primary btn--gradient"
                            @click="createComment"
                        >
                            Comentar
                        </a>
                    </in-place-loader>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            comments: [],

            userComment: '',
        }
    },

    props: {
        'userId': {
            default: null,
        },

        'itemId': [String, Number],
    },

    methods: {
        async fetchComments() {
            /**
             * Fetch all comments for a given item.
             */

            let { data } = await window.axios.get(`/api/items/${this.itemId}/comments`);

            this.comments = data.data;
        },

        async createComment() {
            /**
             * Creates a new comment.
             */

            this.$refs.loader.start();
            if (this.userComment == '') return;

            let comment = await window.axios.post(`/api/items/${this.itemId}/comments`, {
                'user_id': this.userId,
                'text': this.userComment
            });

            this.comments.push(comment.data);
            this.$refs.loader.finish();

            this.userComment = '';

            if (!this.hasComment()) {
                document.querySelector('#timeline .timeline__card').style.marginTop = '0';

            } else {
                document.querySelector('#timeline .timeline__item:last-child').style.paddingBottom = '0';
            }

            this.comments.push(comment.data);

            this.userComment = '';
        },

        hasComment() {
            /**
             * Returns whether there exists any comment on comment list.
             */

            return (typeof this.comments !== 'undefined' && this.comments.length > 0);
        },

        adjustLastItemPosition() {
            /**
             * If none comment exists yet, add a spacing.
             */


            if (this.hasComment()) {
                let lastItem = document.querySelector('#timeline .timeline__item:last-child');
                let padding = lastItem.querySelector('.timeline__content').offsetHeight;
                if (this.userId) {
                    lastItem.style.paddingBottom = padding * 1.3 + 'px';

                } else {
                    lastItem.style.marginBottom = padding + 'px';
                }

            } else {
                document.querySelector('#timeline .timeline__card').style.marginTop = '4rem';
            }
        },
    },

    filters: {
        capitalize: function (value) {
            return value.replace(/\w\S*/g, function (txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
        },

        formatDate: function (date) {
            /**
             * Returns a date on the format dd/mm/YYYY.
             */
            let fullDate = new Date(date);

            let day = fullDate.getDate();
            let month = fullDate.getMonth() + 1;
            let year = fullDate.getFullYear();

            return `${day}/${month.toString().padStart(2, '0')}/${year}`;
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
