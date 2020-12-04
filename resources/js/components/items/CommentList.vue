<template>
    <div>
        <h6>Comentários ({{ comments.length }})</h6>
        <div class="form-group p-3 card" v-bind="comment"
            v-for="comment in comments" :key="comment.id">
            <label><strong>{{ comment.user | capitalize }}</strong></label>
            <p>{{comment.text}}</p>
            <small class="text-right" >{{comment.date | prettyDate}}</small>
        </div>
        <!-- <reaction-list
            :user-id="userId"
            :item-id="comment.id"
        >
        </reaction-list> -->

        <form @submit.prevent="createComment" class="card p-4">
            <h6> Adicionar um Comentários</h6>
            <textarea id="userComment"  name="userComment"
                class="form-control" v-model="userComment"
                rows="4">
            </textarea>
            <button class="btn btn-warning mt-3"
                    type="submit"
            >Comentar</button>
        </form>

        </div>
    </div>
</template>

<script>
import Swal from 'sweetalert2';
export default {
    props: ['user','itemId'],
    data() {
        return {
            comments: [],
            userComment: '',
        }
    },
    methods: {
        async fetchComments() {
            let { data } = await window.axios.get(`/api/service/${this.itemId}/comments`);
            this.comments = data.data;
        },

        async createComment() {
            let data = {
            "user_id": this.user.id,
            "user": this.user.name,
            "text": this.userComment,
            };
            console.log(data);
            try {
                let response = await window.axios.post(`/api/service/${this.itemId}/comments`,data);
                this.handleSuccess(response);
            }
            catch(err) {
                this.handleError(err);
            }
        },

        handleError(err){
            let data = err.response.data;
            console.log(data);
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                title: 'Falha no envio do Feedback, por favor tente mais tarde!!'
                })
        },

        handleSuccess(response){
            const Toast = Swal.mixin({
                toast: true,
                position: 'center',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                    icon: 'success',
                title: 'Feedback Enviado com sucesso!!'
                }).then(function(){
                    location.reload();
                })
            this.resetData();
            
        },
    },

    created() {
        this.fetchComments();
    },

}
</script>
