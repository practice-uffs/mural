<template>
  <!-- Modal -->
<div class="modal fade" id="FeedbackModal" tabindex="-1" role="dialog" aria-labelledby="FeedbackModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="FeedbackModalLabel">Feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <FeedbackForm :user="user"/>
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
    props:['feedback','user'],
    components:{
      FeedbackForm,
    }

}
</script>

<style>

</style>