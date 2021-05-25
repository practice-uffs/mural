<template>
    <div>
        <h6>Comentários ({{ comments.length }})</h6>
        <div v-if="comments">
        <div class="form-group p-3 card" v-bind="comment"
            v-for="comment in comments" :key="comment.id">

            <div class="d-flex justify-content-between">
                <label><strong>{{ comment.user | capitalize }}</strong></label>
                <div class="dropdown" v-if="user.id == comment.user_id">
                    <button class="btn btn-sm" type="button" :id="'dropdownMenuButton-'+comment.id" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ri-more-2-fill"></i>
                    </button>
                    <ul class="dropdown-menu" :aria-labelledby="'dropdownMenuButton-'+comment.id">
                        <a class="dropdown-item" @click="deleteComment(comment.id)">Excluir</a>
                    </ul>
                </div>
            </div>
            <p>{{comment.text}}</p>

            <label><strong>{{ comment.user | capitalize }}</strong></label>
            <p style="white-space:pre-wrap">{{comment.text}}</p>

            <small class="text-end" >{{comment.date | prettyDate}}</small>
        </div>
        <!-- <reaction-list
            :user-id="userId"
            :item-id="comment.id"
        >
        </reaction-list> -->

        </div>
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
</template>

<script>
import Swal from 'sweetalert2';
export default {
    props: ['user','itemId','token'],
    data() {
        return {
            comments: [],
            userComment: '',
        }
    },
    methods: {
        async fetchComments() {
            let { data } = await window.axios.get(`/api/service/${this.itemId}/comments`,{
                headers:{
                    'Authorization': `Bearer ${this.token.access_token}`
                },
            });
            this.comments = data.data;
        },

        async createComment() {
            let data = {
            "user_id": this.user.id,
            "user": this.user.name,
            "text": "#cliente " + this.userComment,
            };
            try {
                let response = await window.axios.post(`/api/service/${this.itemId}/comments`,data,{
                    headers:{
                        'Authorization': `Bearer ${this.token.access_token}`
                    },
                });
                if(response.status != 201){
                    this.handleError("Falha no envio do Comentário", JSON.stringify(response.data));
                }else{
                    this.handleSuccess("realizado");
                    data.id = data.id?(this.comments[this.comments.length-1].id) + 2:response.data.id;
                    data.date = new Date().toISOString()
                    data.text = data.text.replaceAll("#cliente","")
                    this.comments.push(data);
                    this.userComment="";
                }
            }
            catch(err) {
                this.handleError("Falha no envio do Comentário", err);
            }
        },

        async deleteComment(commentId){
            try {
                let response = await window.axios.delete(`/api/service/${this.itemId}/comments/${commentId}`, {
                    headers:{
                        'Authorization': `Bearer ${this.token.access_token}`
                    }, 
                });
                
                if(response.status != 204){
                    this.handleError("Falha na exclusão do Comentário", JSON.stringify(response.data));
                } else {
                    this.handleSuccess("excluido");
                    this.comments = this.comments.filter((comment) =>{
                        return comment.id != commentId;
                    });                
                }
            } catch(err) {
                this.handleError("Falha na exclusão do Comentário", JSON.stringify(response.data));
            }
        },

        handleError(msg, err){
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: `${msg},\n${err}\n por favor tente mais tarde!!`,
                })
        },

        handleSuccess(action){
            const Toast = Swal.mixin({
                toast: true,
                position: 'center',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                    icon: 'success',
                    title: `Comentário ${action} com sucesso!!`
                })
            
        },
    },

    created() {
        this.fetchComments();
    },

}
</script>

<style scoped>
.card{
    margin: 15px;
}
</style>