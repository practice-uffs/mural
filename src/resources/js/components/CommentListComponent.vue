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
                        {{ comment.id }}
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
                        class="btn btn-primary"
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
    data: function() {
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
             * Fetch all comments for a given item.
             */

            let { data } = await window.axios.get(`/api/items/${this.itemId}/comments`);

            this.comments = data.data;
        },

        async createComment() {
            /**
             * Creates a new comment.
             */

            if (!this.hasComment()) {
                document.querySelector('#timeline .timeline__card').style.marginTop = '0';
            }

            if (this.userComment == '') return;

            let comment = await window.axios.post(`/api/items/${this.itemId}/comments`, {
                'user_id': this.userId,
                'text': this.userComment
            });

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

            if (!this.hasComment()) {
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
        console.log(this.itemId);
    },

    updated() {
        this.adjustLastItemPosition();
    }
}
</script>
