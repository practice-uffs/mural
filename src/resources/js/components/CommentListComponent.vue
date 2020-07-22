<template>
    <div
        id="timeline"
        :class="['timeline',
        {'timeline--with-comment': !userCommented}
    ]">
        <ul class="timeline__list">
            <li
                v-for="comment in comments"
                :key="comment.id"
                class="timeline__item"
            >
                <div class="timeline__icon">
                </div>

                <div class="timeline__content">
                    <div class="timeline__title">
                        {{ comment.user }}
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

        <div v-if="!userCommented"
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
                    <a href="#" class="btn btn-primary right">comentar</a>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            comments: [
                {
                    'id': 1,
                    'user_id': 3,
                    'user': 'John Doe',
                    'text': 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    'date': new Date(),
                },
                {
                    'id': 2,
                    'user_id': 1,
                    'user': 'John Doe',
                    'text': 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    'date': new Date()
                },
                {
                    'id': 3,
                    'user_id': 10,
                    'user': 'John Doe',
                    'text': 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    'date': new Date()
                }
            ],

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

            let rawComments = await window.axios.get(`/api/items/${this.itemId}/comments`);

            console.log(rawComments);
        },

        async createComment() {
            await window.axios.post(`/api/items/${this.itemId}/comments`, {
                'user_id': this.userId,
                'text': this.userComment
            });
        },

        setLastItemHeight() {
            let lastItem = document.querySelector('#timeline .timeline__item:last-child');
            let padding = lastItem.querySelector('.timeline__content').offsetHeight;

            if (this.userCommented) {
                lastItem.style.marginBottom = padding + 'px';

            } else {
                lastItem.style.paddingBottom = padding * 1.3 + 'px';
            }
        }
    },

    computed: {
        userCommented: function() {
            return this.comments.find(comment => {
                return comment.user_id == this.userId
            });
        }
    },

    mounted() {
        this.setLastItemHeight();
    }
}
</script>
