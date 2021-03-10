<template></template>

<script>
import Swal from 'sweetalert2';
export default {
    check: async function (token) {
        let response = await axios.get('/api/auth/is_valid',{
        params:{
                'token': `Bearer ${token.access_token}`,
            },
        })
        if(response.data.valid == false){
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Esta sessão foi expirada, por favor faça o login novamente',
                confirmButtonColor:'#f9a93c'
            }).then(()=>{
                location.replace('/logout')
            });
        }
    }
}
</script>