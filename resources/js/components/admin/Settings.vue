<template>

    <div class="main-content" style="width:calc(100% - 230px);margin-left:230px;min-height:calc(100% - 42.712px);max-height:100%;">
        <div class="container-fluid p-4">
                        <!-- content of a url -->
            <div class="p-5 overflow-auto card" style="box-shadow:5px 7px 8px 3px #000000a6;">
                <span class="display-4">Settings</span>
                <div class="row border-bottom mb-2"></div>
                <div class="card bg-light mb-3 shadow-lg bg-white" style="width: 600px;">
                    <div class="card-header text-muted font-weight-bolder">Manage Year Level | Course/Strand Connection</div>
                    <div class="card-body overflow-auto">
                        <!-- <div class="alert alert-success">Year was added</div> -->
                        <!-- Year Level row -->
                        <form @submit.prevent="submit">
                            <transition name="bounce">
                                <div v-bind:class="flag" id="year_message" v-if="sblock">{{message}}</div>
                            </transition>
                            <div class="row border-bottom pb-2">
                                <div class="col-4 text-center">
                                    <input v-model="year_name" type="text" v-on:keypress="isLetter($event)" class="form-control" placeholder="Year level"  required/> 
                                </div>
                                <div class="col-5 text-left">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus pr-2"></i>Add</button>
                                </div>
                            </div>
                        </form>
                        <!-- Course or Strand Row -->
                        <form @submit.prevent="connect">
                            <div class="row border-bottom py-2">
                                <div class="col">
                                    <select class="custom-select" v-model="year_level" required>
                                        <option selected value="">Select Year level</option>
                                        <option v-for="i in year_data" :value="i.id" :key="i.id"> {{ i.name }}</option>
                                    </select>
                                </div>
                                <div class="col text-center">
                                    <input type="text" class="form-control" placeholder="Strand" v-model="course" required/> 
                                </div>
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus pr-2"></i>Add</button>
                                </div>
                            </div>
                        </form>
                        <div class="row py-2">
                            <div class="col text-center border-bottom py-1">
                                <div class="text-muted font-weight-bold">Year Level Data</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <table class="table table-stripped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Year Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="data in yeardata.data" :key="data.id">
                                            <td><input type="text" class="border-inactive" v-bind:value="data.name" disabled/> </td>
                                            <td>
                                                <button type="button" title="edit" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i>&nbsp;</button>
                                                <button type="button" title="delete" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i>&nbsp;</button>
                                            </td>
                                        </tr>
                                    </tbody>        
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <pagination :data="yeardata" @pagination-change-page="getResults"></pagination>       
                            </div>
                        </div>
                         <div class="row py-2">
                            <div class="col text-center border-bottom py-1">
                                <div class="text-muted font-weight-bold">Course/Strand Data</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <table class="table table-stripped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Year Name</th>
                                            <th>Course Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="course in coursedata.data" :key="course.id">
                                            <td>{{ course.yearname }}</td>
                                            <td>{{ course.name }}</td>
                                            <td>
                                                <button type="button" title="edit" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i>&nbsp;</button>
                                                <button type="button" title="delete" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i>&nbsp;</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <pagination :data="coursedata" @pagination-change-page="getCourse"></pagination>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import pagination from 'laravel-vue-pagination';
export default{
    components:{pagination},
    props:['year_data'],
    data(){
    return {
        year_name: '',
        message: '',
        flag: '',
        sblock: false,
        year_level: '',
        course: '',
        yeardata: {},
        coursedata:{},


    }
},created() {
            this.getResults();
            this.getCourse();

},
methods:{
    getResults(page = 1) {
        axios.get('/paginate_year?page=' + page)
        .then((response) => {
            this.yeardata = response.data;
        });
     },
     getCourse(pageview = 1){
         axios.get('/get_course?page=' + pageview).then((r)=>{
             this.coursedata = r.data;
             console.log(r.data);
         });
     },
     isLetter(e) {
            let char = String.fromCharCode(e.keyCode); // Get the character
            if(/^[A-Za-z]+$/.test(char)){
                return true; // Match with regex
            }else{
                e.preventDefault();  // If not match, don't add to input text
            }
        },
        submit(){ 
            axios.post('/store_year',{year_name:this.year_name}).then(response =>{
                this.year_name = '';   
                if(response.data == "exist"){
                    this.message = 'Year level is already exist!';
                    this.flag = 'alert alert-danger text-center font-weight-bold';
                    this.sblock = true;
                    setTimeout(()=>{ this.sblock = false},3500);
                    setTimeout(()=>{ window.location.reload()},1000);
                }else{
                    this.message = 'Year level was successfully added!';
                    this.flag = 'alert alert-success text-center font-weight-bold';    
                    this.sblock = true;
                    setTimeout(()=>{ this.sblock = false},3500);
                    setTimeout(()=>{ window.location.reload()},1000);
                }});
          
        },connect(){
           if(confirm('are you sure?')){
               axios.post('/create_course',{year_level: this.year_level, course: this.course}).then( res =>{
                    if(res.data == "created"){
                        this.message = 'Year and strand was save and connected!';
                        this.flag = 'alert alert-success text-center font-weight-bold';
                        this.sblock = true;
                        setTimeout(()=>{ this.sblock = false},3500);
                        setTimeout(()=>{ window.location.reload()},1000);
                    }else if(res.data == "record-exist"){
                        this.message = 'Year and Strand is already exist!';
                        this.flag = 'alert alert-danger text-center font-weight-bold';
                        this.sblock = true;
                        setTimeout(()=>{ this.sblock = false},3500);
                        setTimeout(()=>{ window.location.reload()},1000);
                    }
                    
               });
           }
        }

}
}

</script>
