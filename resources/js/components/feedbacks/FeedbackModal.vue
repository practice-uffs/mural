<template>
<!-- Modal -->
<div class="modal fade" id="FeedbackModal" tabindex="-1" aria-labelledby="FeedbackModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="FeedbackModalLabel">Feedback</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <FeedbackForm :user="user" :token="token"/>
      </div>
    </div>
  </div>
</div>
</template>

<script>
const FEEDBACK = 1;
import FeedbackForm from './FeedbackForm';

export default {
    name:'FeedbackModal',
    props:['feedback','user','token'],
    components:{
      FeedbackForm,
    }

}
</script>

<style>

</style>