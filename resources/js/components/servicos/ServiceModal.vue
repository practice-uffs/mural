<template>
<!-- Modal -->
<div class="modal fade" id="ServiceModal" tabindex="-1" aria-labelledby="ServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ServiceModalLabel">Solicitação de Serviço</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ServiceForm :user="user" :token="token"/>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import ServiceForm from './ServiceForm';

export default {
    name:'ServiceModal',
    props:['service','user','token'],
    components:{
      ServiceForm,
    }

}
</script>

<style>

</style>