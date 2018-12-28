@extends('admin.layouts.master')
@section('contentBody')
    <div class="panel">
        <!-- Records Header Start -->
        <div class="records--header">

            <div class="actions mx-auto">
                <form action="#" class="search flex-wrap flex-md-nowrap">
                    <input type="text" class="form-control" placeholder="Department Name..." required>
                    <select name="select" class="form-control">
                        <option value="" selected>Department Status</option>
                    </select>
                    <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                </form>

                <a href="{{ route('department.create') }}" class="addProduct btn btn-lg btn-rounded btn-warning">Add Department</a>
            </div>
        </div>
        <!-- Records Header End -->
    </div>
    <div class="panel">
        <!-- Records List Start -->
        <div>
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
                @foreach($departments as $key=>$department)
                <tr>
                    <td>{{ $key+1 }}</td>
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
