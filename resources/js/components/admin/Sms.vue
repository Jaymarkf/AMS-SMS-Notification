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
                <form class=" px-5">
                    <input type="checkbox" data-toggle="toggle" :checked="showChkState()" data-on="Send to all" data-off="Off" data-onstyle="success" data-offstyle="danger">
                    <small class="form-text text-muted">Toggle to send to all student / Off to send to only specific year levels and course / strand</small>
                    <hr>
                    <div class="form-group">
                        <label for="year">Year Level</label>
                        <select class="form-control" id="year" required>
                            <option value="">Select Course / Strand ...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="course">Course / Strand</label>
                        <select class="form-control" id="course" required>
                            <option value="">Select Course / Strand ...</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea class="form-control"  id="message" rows="3"  maxlength="160" required></textarea>
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
export default {

    data() {
      return {
          course: '',
          sms_toggle:'',
      }
    },methods:{
      showChkState(){
         console.log('aaa');
      },
    },mounted:
    function (){          
            axios.get('/api/get_credit_balance').then(res=>{
                $('#credit-wrapper').html(res.data)
            });  
      
    },
   
    
}
</script>