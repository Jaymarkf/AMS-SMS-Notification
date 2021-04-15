<div class="main-content" style="width:calc(100% - 230px);margin-left:0px;min-height:calc(100% - 42.712px);max-height:100%;">
                    <div class="container-fluid p-4">
                        <!-- content of a url -->
                        <div class="p-5 overflow-auto card" style="box-shadow:5px 7px 8px 3px #000000a6;">
                        <!-- render to view -->
                        <div class="row">
                            <div class="text-center">
                                <div class="display-4">
                                    Student Information
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <form action="{{route('save_new_student')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="p-3">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-plus fa-lg pr-2"></i>
                                    Add new
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add new student</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- MODAL BODY -->
                                        <div class="modal-body">
                                           <Idnumber></Idnumber>
                                            <div class="form-group">
                                                <label for="mFname">First name</label>
                                                <input type="text" class="form-control" name="first_name" id="mFname" placeholder="First name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="mMname">Middle name</label>
                                                <input type="text" class="form-control" name="middle_name" id="mMname" placeholder="Middle name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="mLname">Last name</label>
                                                <input type="text" class="form-control" name="last_name" id="mLname" placeholder="Last name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="contact">Parents Contact #</label>
                                                <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact number" required>
                                            </div>
                                            <div class="form-check">
                                                <label for="gender">Gender</label>
                                                <div  class="d-flex" id="gender">
                                                    <label class="checkbox-inline">
                                                    <input type="radio" name="gender" value="male" required>&nbsp;Male
                                                    </label>
                                                    <div class="pr-2"></div>
                                                    <label class="checkbox-inline">
                                                    <input type="radio" name="gender"  value="female">&nbsp;Female
                                                    </label>
                                                </div>
                                            </div>
                                 
                                             <yearcourse :year="{{$year}}"></yearcourse>
                                             <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <div class="custom-file" id="photo">
                                                    <input type="file" class="custom-file-input" name="photo" id="customFile" required>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                             </div>

                                        <!-- end of modal body -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" id="create">Create</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div style="width:400px;">
                            <form method="get">
                                <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary rounded-left " type="submit">Search</button>
                                </div>
                                @if(isset($_GET['search']))
                                <input type="text" class="form-control" name="search" placeholder="Search here..." value="{{$_GET['search']}}" required>
                                @else
                                <input type="text" class="form-control" name="search" placeholder="Search here..." value="" required>
                                @endif
                                </div>
                            </form>
                        </div>
                   
                         <table class="table table-hover table-stripped table-bordered bg-white">
                            <thead>
                                <tr>  
                                    <th>Profile image</th>   
                                    <th>ID number</th>
                                    <th>Full name</th>
                                    <th>Gender</th>
                                    <th>Year level</th>
                                    <th>Course/Strand</th>
                                    <th>Parent contact #</th>
                                    <th>Action</th>
                                </tr>   
                            </thead>
                            <tbody>
                       
                                @if(!empty($users) && $users->count())
                                    @foreach($users as $key => $value)
                                    <tr >
                                        <td><img class="rounded-circle" src="{{url('/images/'. $value->photo)}}" width="40" alt="loading_image"></td>
                                        <td style="verical-align:middle">{{ $value->id_number }}</td>
                                        <td>{{ $value->first_name . ' '. $value->middle_name. ' '. $value->last_name }}</td>
                                        <td>{{$value->gender}}</td>
                                        <td>{{$value->yearname}}</td>
                                        <td>{{$value->coursename}}</td>
                                        <td>{{$value->parents_contact_number}}</td>
                                       
                              
                                        <td>
                                            <button class="btn btn-primary btn-edit-student" data-toggle="modal"  data-id="{{$value->student_id}}"  title="edit"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="10" class="text-center font-weight-bold">There's no data.</td>
                                </tr>
                                @endif
                            </tbody>
                         </table>
                        @if(isset($users))
                        {{$users->links()}}
                        @endif
                        </div>
                    </div>
                </div>

<div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="editStudentModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <form action="{{route('save_edit_student')}}" method="post">
          @csrf
        <input type="hidden" name="e_student_id" id="e_student_id"/>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="containter-fluid px-2">
                    <div class="text-center py-3">
                    <img src="" id="edit-modal-image" class="img-fluid" width="300"  aria-label="Username" aria-describedby="basic-addon1"/>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Photo</span>
                        </div>
                        <input type="file" class="form-control" name="edit-modal-student-photo" id="edit-modal-student-photo" placeholder="Photo" aria-label="Username" aria-describedby="basic-addon1">
                    
                    </div>
                    <hr>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">Id number</span>
                        </div>
                        <input type="text" class="form-control" name="edit-modal-student-id_number" id="edit-modal-student-id_number"aria-label="Id number" aria-describedby="basic-addon2">
                    </div>
                    <hr>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">First name</span>
                        </div>
                        <input type="text" class="form-control" name="edit-modal-student-first_name" id="edit-modal-student-first_name" aria-label="First name" aria-describedby="basic-addon3">
                    </div>
                    <hr>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon4">Middle name</span>
                        </div>
                        <input type="text" class="form-control" name="edit-modal-student-middle_name" id="edit-modal-student-middle_name" aria-label="Middle name" aria-describedby="basic-addon4">
                    </div>
                    <hr>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon5">Last name</span>
                        </div>
                        <input type="text" class="form-control" name="edit-modal-student-last_name" id="edit-modal-student-last_name" aria-label="Last name" aria-describedby="basic-addon5">
                    </div>
                    <hr>
                    <div class="form-check form-check-inline ml-5">
                        <input class="form-check-input" type="radio" name="edit-modal-student-radio" id="edit-modal-student-radio-male" value="male">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline ml-2">
                        <input class="form-check-input" type="radio" name="edit-modal-student-radio" id="edit-modal-student-radio-female" value="female">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                    <hr>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon6">Parents contact #</span>
                        </div>
                        <input type="text" class="form-control" name="edit-modal-student-prarents_contact_number" id="edit-modal-student-parents_contact_number" aria-label="Parents contact #" aria-describedby="basic-addon6">
                    </div>

                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
  </div>
</div>
      

