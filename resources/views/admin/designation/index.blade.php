@extends('admin.layouts.master')
@section('contentBody')
    <div class="panel" style="overflow:auto;">
        <!-- Records Header Start -->
        <div class="records--header">

            <div class="actions mx-auto">

                {{ Form::model(request(),['method'=>'get','class'=>'search flex-wrap flex-md-nowrap']) }}
                    {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Designation Name']) }}
                    {{ Form::select('department_id',$departments,null,['class'=>'form-control','placeholder'=>'Select Department'])}}
                    {{ Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','placeholder'=>'Select Status'])}}

                    <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                {{ Form::close() }}
                <a href="{{ route('designation.create') }}" class="addProduct btn btn-lg btn-rounded btn-warning"><i class="fa fa-plus"></i> Add New Designation</a>

            </div>
        </div>
        <!-- Records Header End -->
    </div>

    <div class="panel">
        <!-- Records List Start -->
        <div class="table-responsive">
            <h3 style="text-align: center;color:#1b4b72">Designation List</h3>
            <table class="table table-striped custom-table m-b-0 datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Department Name</th>
                    <th>Status</th>
                    <th class="not-sortable">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($designations as $designation)
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{ $designation->name }}</td>
                    <td>{{ $designation->relDepartment->name }}</td>
                    <td>{{ $designation->status }}</td>

                    <td>
                        <div class="dropleft">
                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                            <div class="dropdown-menu">
                                <a href="{{ route('designation.edit',$designation->id) }}" class="dropdown-item">Edit</a>
                                <a href="#" class="dropdown-item" onclick="return confirm('Delete All infromation from this record.')">Delete</a>
                            </div>
                        </div>
                    </td>

                </tr>
                @endforeach

                </tbody>
            </table>
            {{ $designations->links() }}
        </div>
        <!-- Records List End -->
    </div>
@endsection