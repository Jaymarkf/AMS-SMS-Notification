
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
                            <form>
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
                                                <input type="text" class="form-control" id="mFname" placeholder="First name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="mMname">Middle name</label>
                                                <input type="text" class="form-control" id="mMname" placeholder="Middle name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="mLname">Last name</label>
                                                <input type="text" class="form-control" id="mLname" placeholder="Last name" required>
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
                                            <!-- <div class="form-group">
                                                <label for="YearLevel">Year level</label>
                                                <select class="custom-select" id="Yearlevel" required>
                                                    <option selected value="">Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                    </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="course-strand">Course / Strand</label>
                                                <select class="custom-select" id="course-strand" required>
                                                    <option selected value="">Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                    </select>
                                             </div> -->
                                             <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <div class="custom-file" id="photo">
                                                    <input type="file" class="custom-file-input" id="customFile" required>
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
                                <input type="text" class="form-control" name="search" placeholder="Search here..." required>
                                </div>
                            </form>
                        </div>
                   
                         <table class="table table-hover table-stripped table-bordered bg-white">
                            <thead>
                                <tr>    
                                    <th>ID number</th>
                                    <th>Full name</th>
                                    <th>Gender</th>
                                    <th>Year level</th>
                                    <th>Course/Strand</th>
                                    <th>Profile image</th>
                                    <th>Action</th>
                                </tr>   
                            </thead>
                            <tbody>
                       
                                @if(!empty($users) && $users->count())
                                    @foreach($users as $key => $value)
                                    <tr>
                                        <td>{{ $value->username }}</td>
                                        <td>
                                            <button class="btn btn-danger">Delete</button>
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

