<template>
<div>

<div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="editStudentModal" data-show="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      
        
        <input type="hidden" name="e_student_id" class="e_student_id"/>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                <button type="button" class="close" @click="reset_image()" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="submit_file()">
                <div class="container-fluid">
                  <div class="border p-4 rounded" style="border:1px solid #ced4da">
                      <div class="text-center py-3">
                        <img src=""  id="edit-modal-image" v-bind:class="image_class" width="300" v-bind:style="image_style"  aria-label="Username" aria-describedby="basic-addon1"/>
                      </div>
                      <div v-bind:class="alert_class" v-if="image_flag_alert == 1">{{alert_message}}</div>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Reupload an image</span>
                          </div>
                        <input type="file" ref="file" class="form-control" v-on:change="changefile()" @click="store_current_image()" id="edit-modal-student-photo" placeholder="Re-Upload Photo" aria-label="Username" aria-describedby="basic-addon1" accept="image/*">
                      </div>
                      <div class="text-right" v-if="file == 1">
                        <button type="button" class="btn btn-secondary" @click="cancel_file()">Cancel</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i>&nbsp; Upload</button>
                      </div>
                  </div>
                </div>
              </form>


                <form id="edit_form_student" @submit.prevent="submit_edit()" method="post">
                    <input type="hidden" name="e_student_id" class="e_student_id"/>
                  <div class="containter-fluid px-2">
                      <hr>
                      <div class="alert alert-success text-center font-weight-bold" v-if="stud_success == 1">Student Information was succcessfully updated!.</div>
                      <hr>
                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon2">Id number</span>
                          </div>
                          <input type="text" class="form-control"  name="student_id_number" id="edit-modal-student-id_number" aria-label="Id number" aria-describedby="basic-addon2">
                      </div>
                      <div class="alert alert-danger py-1 text-center font-weight-bolder" v-if="id_taken_error == 1">ID number was taken by another student!</div>
                      <hr>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon3">First name</span>
                          </div>
                          <input type="text" class="form-control" name="first_name" id="edit-modal-student-first_name" aria-label="First name" aria-describedby="basic-addon3">
                      </div>
                      <hr>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon4">Middle name</span>
                          </div>
                          <input type="text" class="form-control" name="middle_name" id="edit-modal-student-middle_name" aria-label="Middle name" aria-describedby="basic-addon4">
                      </div>
                      <hr>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon5">Last name</span>
                          </div>
                          <input type="text" class="form-control" name="last_name" id="edit-modal-student-last_name" aria-label="Last name" aria-describedby="basic-addon5">
                      </div>
                      <hr>
                      <div class="form-check form-check-inline ml-5">
                          <input class="form-check-input" type="radio"  name="student_radio" id="edit-modal-student-radio-male" value="male">
                          <label class="form-check-label" for="inlineRadio1">Male</label>
                      </div>
                      <div class="form-check form-check-inline ml-2">
                          <input class="form-check-input" type="radio" name="student_radio" id="edit-modal-student-radio-female" value="female">
                          <label class="form-check-label" for="inlineRadio2">Female</label>
                      </div>
                      <hr>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon6">Parents contact #</span>
                          </div>
                          <input type="text" class="form-control" name="prarents_contact_number" id="edit-modal-student-parents_contact_number" aria-label="Parents contact #" aria-describedby="basic-addon6">
                      </div>     
                  </div>
       
                    <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save changes</button>
                         <button type="button" class="btn btn-secondary" @click="reset_image()" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
         
        </div>

  </div>
</div>
</div>
</template>

<script>
export default {
    data() {
      return {
          file:0,
          current_image: '',
          image_to_upload: '',
          student_id: '',

          student_id_number: '',
          first_name: '',
          middle_name:'',
          last_name:'',
          gender:'',
          parents_contact_number: '',
          image_flag_alert: 0,
          image_load: '',
          image_class:'',
          image_style:{
            width: '',
            height: '',
          },
          alert_class:'',
          alert_message: '',
          id_taken_error: 0,
          stud_success: 0,

      }
    },methods:{
        reset_image(){
          $('#edit-modal-student-photo').val('');
          this.file = 0;
          this.id_taken_error = 0;
          this.stud_success = 0;
        },
        submit_file(){
          this.image_class = "spinner-border";
          this.image_style.width = '3rem';
          this.image_style.height = '3rem';
          this.alert_class = 'alert alert-primary py-1 text-center font-weight-bolder';
          this.image_flag_alert = 1;
          this.alert_message = 'Uploading ....';
          
          const URL = '/save_edit_student'; 
          let data = new FormData();
          data.append('e_student_id', this.student_id);
          data.append('file',this.image_to_upload); 
          let config = {
            header : {
              'content-Type' : 'multipart/form-data'
            }
          }

          axios.post(
            URL, 
            data,
            config
          ).then(
            response => {
              if(response.data == 'success-upload'){
                this.image_class = "img-fluid";
                this.image_style.width = '';
                this.image_style.height = '';
                this.alert_class = 'alert alert-success py-1 text-center font-weight-bolder alert-success-modal';
                this.alert_message = "Image successfully uploaded!";
                this.file = 0;
                $('#edit-modal-student-photo').val('');
                setTimeout(()=>{this.image_flag_alert = 0;},3000);  
              }
            }
          )
        },
        submit_edit(){
          const url = '/save_edit_student';
       
        //  let data = [{'id_number':this.student_id_number,'first_name':this.first_name,'middle_name':this.middle_name,'gender':this.gender,'parents_contact_number':this.parents_contact_number}]
        let data = $('#edit_form_student').serialize();
            axios.post(url,data).then(res=>{
                this.id_taken_error = 0;
                this.stud_success = 1;
            }).catch(error=>{
                this.id_taken_error = 1;
                this.stud_success = 0;
            });
        },changefile(){
          this.image_to_upload = this.$refs.file.files[0];
          this.student_id_number = $('#edit-modal-student-id_number').val();
          this.first_name = $('#edit-modal-student-first_name').val()
          this.middle_name = $('#edit-modal-student-middle_name').val();
          this.last_name = $('#edit-modal-student-last_name').val();
          this.parents_contact_number = $('#edit-modal-student-parents_contact_number').val();


          this.student_id = $('.e_student_id').val();
          this.file = 1;
        },cancel_file(){
          $('#edit-modal-image').attr('src',this.current_image);
          $('#edit-modal-student-photo').val('');

          this.file = 0;
        },store_current_image(){
          this.current_image = $('#edit-modal-image').attr('src');
        }

    },mouted:function(){
    
    }
  }
</script>
