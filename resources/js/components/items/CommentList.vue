<template>
    <div>
        <h6>Comentários ({{ comments.length }})</h6>
        <div v-if="comments">
        <div class="form-group p-3 card" v-bind="comment"
            v-for="comment in comments" :key="comment.id">
            <label><strong>{{ comment.user | capitalize }}</strong></label>
            <p>{{comment.text}}</p>
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
                console.log(response.data);
                if(response.data != 201){
                    this.handleError(JSON.stringify(response.data));
                }else{
                    this.handleSuccess();
                    data.id = data.id?(this.comments[this.comments.length-1].id) + 2:0;
                    data.date = new Date().toISOString()
                    data.text = data.text.replace("#cliente","")
                    this.comments.push(data);
                    this.userComment="";
                }
            }
            catch(err) {
                this.handleError(err);
            }
        },

        handleError(err){
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
                    title: `Falha no envio do Comentário,\n${err}\n por favor tente mais tarde!!`,
                })
        },

        handleSuccess(){
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
                    title: 'Comentário realizado com sucesso!!'
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