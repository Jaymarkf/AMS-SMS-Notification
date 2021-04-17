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
                                                    <input type="file" class="custom-file-input" name="photo" id="customFile" accept="image/*" required>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                             </div>

                                        <!-- end of modal body -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" id="create">Create</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

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
                                            <button class="btn btn-danger btn-delete-student" title="delete" data-id="{{$value->student_id}}"><i class="fa fa-trash"></i></button>
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
    <Modalstudent></Modalstudent>
