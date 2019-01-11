@extends('admin.layouts.master')
@section('contentBody')
    <div class="panel" style="overflow:auto;">
        <!-- Records Header Start -->
        <div class="records--header">
            <div class="col-sm-12 text-right m-b-30">
                <a href="{{ route('user.create') }}" class="addProduct btn btn-lg btn-rounded btn-warning"><i class="fa fa-plus"></i> Add New User</a>
            </div>

            <div class="actions mx-auto">

                {{ Form::model(request(),['method'=>'get','class'=>'search flex-wrap flex-md-nowrap']) }}
                {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'User Name']) }}
                {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) }}
                {{ Form::select('type',['Admin'=>'Admin','Employee'=>'Employee'],null,['class'=>'form-control','placeholder'=>'Select Type']) }}
                {{ Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','placeholder'=>'Select Status']) }}
                <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                {{ Form::close() }}

            </div>
        </div>
        <!-- Records Header End -->
    </div>
    <div class="panel">
        <!-- Records List Start -->
        <div class="table-responsive">
            <h3 style="text-align: center;color:#1b4b72">User List</h3>
            <table class="table table-striped custom-table m-b-0 datatable">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th class="not-sortable">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)

                    <tr>
                        <td>{{ $serial++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->type }}</td>
                        <td>{{ $user->relDepartment->name }}</td>
                        <td>{{ $user->relDesignation->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            <div class="dropleft">
                                <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                <div class="dropdown-menu">
                                    <a href="{{ route('user.show',$user->id) }}" class="dropdown-item">Profile</a>
                                    <a href="{{ route('user.edit',$user->id) }}" class="dropdown-item">Edit</a>
                                    <a href="{{ route('payroll.manage',$user->id) }}" class="dropdown-item">Payroll Manager</a>
                                    <a href="#" class="dropdown-item" onclick="return confirm('Delete All infromation from this record.')">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}


        </div>
        <!-- Records List End -->
    </div>

@endsection
