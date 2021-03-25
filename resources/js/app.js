require('./bootstrap');


import Vue from 'vue';
import Idnumber from './components/Students.vue';

const app = new Vue({
el: '#app',
components: {
    Idnumber
}
});

//jquery
$(document).ready(function(){
    $('#p-minimizer').click(function(){
       if($('#minimizer').hasClass('fa-toggle-on')){
           $('#minimizer').addClass('fa-toggle-off');
           $('#minimizer').removeClass('fa-toggle-on');
           $('#sidebar').css('margin-left','-190px');
           $('.main-content').css({'width':'100%','margin-left':'40px'});
           $('.sidebar_icon').css({'margin-left':'182px','margin-top':'40px'});
       }else{
        $('#minimizer').addClass('fa-toggle-on');
           $('#minimizer').removeClass('fa-toggle-off');    
           $('#sidebar').css('margin-left','0px');
           $('.main-content').css({'width':'calc(100% - 230px)','margin-left':'230px'});
           $('.sidebar_icon').css('margin','0');
       }
    }); 

});

//axios

