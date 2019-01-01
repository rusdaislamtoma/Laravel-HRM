@extends('admin.layouts.master')
@section('contentBody')
    <div class="panel">
        <!-- Records Header Start -->
        <div class="records--header">


            <div class="actions mx-auto">
                @php
                  $name=null;
                   if(isset($_GET['name'])){
                      $name = $_GET['name'];
                   }

                   $status=null;
                   if(isset($_GET['status'])){
                      $status= $_GET['status'];
                   }
                @endphp
                {{ Form::open(['method'=>'get','class'=>'search flex-wrap flex-md-nowrap']) }}
                    {{ Form::text('name',$name,['class'=>'form-control','placeholder'=>'Department Name']) }}
                    {{ Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],$status,['class'=>'form-control','placeholder'=>'Select Status']) }}
                    <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                {{ Form::close() }}

                <a href="{{ route('department.create') }}" class="addProduct btn btn-lg btn-rounded btn-warning"><i class="fa fa-plus"></i> Add New Department</a>


            </div>
        </div>
        <!-- Records Header End -->
    </div>
    <div class="panel">
        <!-- Records List Start -->
        <div>
            <h3 style="text-align: center;color:#1b4b72">Department List</h3>
            <table class="table table-striped custom-table m-b-0 datatable">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Department Name</th>
                    <th>Status</th>
                    <th class="not-sortable">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->status }}</td>

                    <td>
                        <div class="dropleft">
                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                            <div class="dropdown-menu">
                                <a href="{{ route('department.edit',$department->id) }}" class="dropdown-item">Edit</a>
                                <a href="#" class="dropdown-item" onclick="return confirm('Delete All infromation from this record.')">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
             {{ $departments->links() }}

        </div>
        <!-- Records List End -->
    </div>

@endsection
