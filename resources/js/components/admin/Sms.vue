<template>
<div>
    <div class="row">
        <div class="col">
            <div class="text-left">
                <div class="display-4 font-weight-bold">
                    SMS
                </div>
            </div>
        </div>
        <div class="col">
            <div class="text-right">
                <div class="container-fluid">
                    <span class="text-muted font-weight-bold">Available Credits <span class="badge badge-pill badge-primary" id="credit-wrapper"></span></span>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col mx-5">
            <div class="container-fluid mx-5">
                <form class="px-5" @submit.prevent="Send_SMS()" id="form_send_sms">
                    <input type="checkbox" data-toggle="toggle"  data-on="Send to all" data-off="Off" data-onstyle="success" data-offstyle="danger">
                    <small class="form-text text-muted">Toggle to send to all student / Off to send to only specific year levels and course / strand</small>
                    <hr>
                    <yearcourse v-bind:year="year"></yearcourse>
                     <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea class="form-control"  id="message" rows="3"  name="post_sms_message" maxlength="160" required></textarea>
                        <small id="alert_max_message" class="form-text text-muted text-danger">Maximum characters limit is 160</small>
                    </div>
                    <div class="text-left">
                         <button type="submit" class="btn btn-success"><i class="fa fa-upload mr-2"></i>Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




</div>

</template>
<script>
import yearcourse from './StudentYearCourse.vue';
export default {
    components:{yearcourse},
    props:['year'],
    data() {
      return {
          course: '',
          sms_toggle:'',
      }
    },methods:{
            Send_SMS(){
                var data = $('#form_send_sms').serialize();
                axios.post('/send_sms',data).then(res=>{
                    console.log(res);
                });
            }   
    },mounted:
    function (){          
            axios.get('/api/get_credit_balance').then(res=>{
                $('#credit-wrapper').html(res.data)
            });  

    },
   
    
}
</script>