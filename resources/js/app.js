require('./bootstrap');

$('#loading').addClass('custom-modal');
import Vue from 'vue';
import Idnumber from './components/admin/Students.vue';
import settingsyear from './components/admin/Settings.vue';
import modalstudent from './components/admin/Modals.vue';
import yearcourse from './components/admin/StudentYearCourse.vue';
import sms from './components/admin/Sms.vue';
// window.Vue = require('vue');
// Vue.component('Idnumber',require('./components/admin/Students.vue'));
// Vue.component('settingsyear',require('./components/admin/Settings.vue'));
// Vue.component('pagination',require('laravel-vue-pagination'));

const app = new Vue({
el: '#app',
components: {Idnumber,settingsyear,modalstudent,yearcourse,sms}
});

//jquery
$(function(){
    setTimeout(()=>{$('#loading').removeClass('custom-modal')},1500);
    $('#p-minimizer').on('click',function(){
       if($('#minimizer').hasClass('fa-toggle-on')){
           $('#minimizer').addClass('fa-toggle-off');
           $('#minimizer').removeClass('fa-toggle-on');
           $('#sidebar').css('margin-left','-190px');
           $('.main-content').css({'width':'100%','margin-left':'0px'});
           $('.sidebar_icon').css({'margin-left':'182px','margin-top':'40px'});
       }else{
        $('#minimizer').addClass('fa-toggle-on');
           $('#minimizer').removeClass('fa-toggle-off');    
           $('#sidebar').css('margin-left','0px');
           $('.main-content').css({'width':'calc(100% - 230px)','margin-left':'0px'});
           $('.sidebar_icon').css('margin','0');
       }
    }); 

    
    $('#customFile').on('change',function(){
        let filename = $(this).val();
        $(this).next('.custom-file-label').html(filename);
    });
   $('.btn-edit-student').on('click',function(){
        axios.get('/edit_student/'+$(this).attr('data-id')).then(res=>{
            $('#editStudentModal').modal('toggle');
            $('.e_student_id').val(res.data.id);
            $('#edit-modal-image').attr('src','/images/'+res.data.photo);
            $('#edit-modal-student-id_number').val(res.data.id_number);
            $('#edit-modal-student-first_name').val(res.data.first_name);
            $('#edit-modal-student-middle_name').val(res.data.middle_name);
            $('#edit-modal-student-last_name').val(res.data.last_name);
            if(res.data.gender == "male"){
                $('#edit-modal-student-radio-male').prop('checked',true);
            }else{
                $('#edit-modal-student-radio-female').prop('checked',true);
            }
            $('#edit-modal-student-parents_contact_number').val(res.data.parents_contact_number);
        });
   });
   //show image after inputs
   $('#edit-modal-student-photo').on('change',function(){
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
     {
        var reader = new FileReader();

        reader.onload = function (e) {
           $('#edit-modal-image').attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
    }
  });

  //delete student
  $('.btn-delete-student').on('click',function(){
      let id = $(this).attr('data-id');
      if(confirm('are you sure you want to delete this student?')){
            $('#loading').addClass('custom-modal');
            axios.post('/delete_student',{delete_id:id}).then(res=>{
                setTimeout(()=>{ window.location.reload()},1500);
            });
      }

  });


    $('label.btn.btn-danger').on('click',function(){
        //on activated
        $('#Yearlevel').val('');
        $('#course-strand').val('');
        $('#Yearlevel').attr('disabled','disabled');
        $('#course-strand').attr('disabled','disabled');
        
    });
    $('label.btn.btn-success').on('click',function(){
        //off activated
        $('#Yearlevel').removeAttr('disabled');
        $('#course-strand').removeAttr('disabled');

    });

  //toggle sms


  $('#editStudentModal').modal({
    show:false,
    backdrop: 'static',
    keyboard: false
    });
});


//axios

