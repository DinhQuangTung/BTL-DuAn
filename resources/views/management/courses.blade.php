<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="manage-account">Manage Courses</div>
                    </div>
                    <div class="col-sm-6 pt-2">
                        <a href="#addUserModal" class="d-flex align-items-center btn btn-success" data-toggle="modal"><i class="faws fas fa-plus-circle"></i><span>Add New Teacher</span></a>
                        <a href="#deleteUserModal" class="d-flex align-items-center btn btn-danger" data-toggle="modal"><i class="faws fas fa-minus-circle"></i><span>Delete</span></a>						
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th class="column-title">ID</th>
                        <th class="column-title">Title</th>
                        <th class="column-title">Created By</th>
                        <th class="column-title">Approval</th>
                        <th class="column-title">Phone</th>
                        <th class="column-title">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                    <label for="checkbox1"></label>
                                </span>
                            </td>
                            <td class="row-content">{{ $course->id}}</td>
                            <td class="row-content">{{ $course->title}}</td>
                            <td class="row-content">{{ $course->teacher_name }}</td>
                            <td class="row-content">
                                <!-- <form method="post" action="{{ route('approve_course', ['id' => $course])}}">
                                    @csrf -->
                                    <button class="btn-approve button-submit float-none {{ $course->approval_status == 'approved' ? 'bg-white text-dark' : ''}}" type="submit" value="{{$course->id}}">{{ $course->approval_status }}</button>
                                <!-- </form> -->
                            </td>
                            <td class="row-content">{{ $course->teacher_phone }}</td>
                            <td class="row-content">
                                <a href="#editUserModal" class="edit" data-toggle="modal"><i class="faws fas fa-pen" data-toggle="tooltip" data-original-title="Edit"></i></a>
                                <a href="#deleteUserModal" class="delete" data-toggle="modal"><i class="faws fas fa-trash" data-toggle="tooltip" data-original-title="Delete"></i></a>
                            </td>
                        </tr>
                        <!-- Edit Modal HTML -->
                        <div id="addUserModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" method="POST">
                                        <div class="modal-header">						
                                            <div class="modal-title">Add User</div>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="faws fas fa-times"></i></button>
                                        </div>
                                        <div class="modal-body">					
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control">
                                            </div>					
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <input type="submit" class="btn btn-success" value="Add">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix d-flex align-items-end">
                @if ($numberOfTeachers >= config('config.pagination'))
                    <div class="hint-text">Showing <b>{{ config('config.pagination') }}</b> out of <b>{{ $numberOfTeachers }}</b> entries</div>
                @endif
                <div class="pagination-custom container mt-5 pr-4 d-flex justify-content-end">
                    {!! $courses->appends($_GET)->fragment('pillsCourse')->onEachSide(1)->links() !!}
                </div>
            </div>
        </div>
    </div>    
    <!-- Edit Modal HTML -->
    <div id="editUserModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">						
                        <div class="modal-title">Edit User</div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="faws fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control">
                        </div>					
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteUserModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">						
                        <div class="modal-title">Delete User</div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="faws fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">					
                        <div>Are you sure you want to delete these Records?</div>
                        <div class="text-warning"><small>This action cannot be undone.</small></div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
