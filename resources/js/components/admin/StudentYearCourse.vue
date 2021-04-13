<template>
    <div>
        <div class="form-group">
            <label for="YearLevel">Year level</label>
            <select class="custom-select" id="Yearlevel" name="year" v-model="year_value" @change="showcourse" required>
                <option selected value="">Click this select menu</option>
                <option v-for="years in year" :key="years.id" :value="years.id" >{{years.name}}</option>
            </select>
        </div>
            <div class="form-group">
            <label for="course-strand">Course / Strand</label>
            <select class="custom-select" id="course-strand" name="course" required>
                <option selected value="">Click this select menu</option>
                <option v-for="courses in course" :key="courses.id" :value="courses.id" >{{courses.name}}</option>          
            </select>
    </div>
   </div>
</template>
<script>
export default{
    props:['year'],
    data(){
        return {
        year_value: '',
        course: '',         
        }
    },created(){
         
    },methods:{
        showcourse(){
           axios.get('/get_course_key/'+this.year_value).then(res=>{
               this.course = res.data;
               
           });
              
        }
    }
}
</script>