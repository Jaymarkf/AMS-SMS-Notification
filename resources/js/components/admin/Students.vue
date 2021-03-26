<template>
 <div class="form-group">
    <label for="exampleInputEmail1">ID Number</label>
    <input v-model="id_number"  type="text" v-bind:class="formcontrol" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ID Number" autocomplete="off" required v-on:blur="checkifavailable" >
    <small id="emailHelp" class="form-text text-muted">If you are unsure please tap your RFID Card in this field</small>
    <div v-bind:class="feedback" id="feedbackmessage">{{feedback_message}}</div>
 </div>
</template>
<script>
window.axios = require('axios');
export default{

data(){
    return {
       validation_message: null,
       id_number: '',
       formcontrol: 'form-control',
       feedback: '',
       feedback_message: '',
       ab: '',
        
    }
},methods:{ 
   checkifavailable(){
      if(this.id_number == ''){
          this.formcontrol = 'form-control is-invalid';
          this.feedback = 'invalid-feedback';
          this.feedback_message = 'Do not leave this field!';
      }else{
         //proceed to check if id number is available using get http  request to API
      axios.get('/api/asd/' + this.id_number)
      .then((response) => {
          if(response.data == "found"){
              this.formcontrol = "form-control is-invalid";
              this.feedback="invalid-feedback";
              this.feedback_message="ID number was already taken please choose another card!";
              $('#create').attr('disabled','disabled');
          }else{
              //not found
               $('#create').prop("disabled", false);
             this.formcontrol = "form-control is-valid";
             this.feedback="valid-feedback";
             this.feedback_message="ID number is available";
            
          }
      });
        
      }
      
    }
},
} /*vue*/
</script>
