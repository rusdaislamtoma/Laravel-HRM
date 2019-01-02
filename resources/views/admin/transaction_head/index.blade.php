@extends('admin.layouts.master')
@section('contentBody')
    <div class="panel" style="overflow:auto;">
        <!-- Records Header Start -->
        <div class="records--header">
            <div class="col-sm-12 text-right m-b-30">
                <a href="{{ route('transaction-head.create') }}" class="addProduct btn btn-lg btn-rounded btn-warning"><i class="fa fa-plus"></i> Add New Transaction Head</a>

            </div>

            <div class="actions mx-auto">
                @php
                    $name=null;
                    if(isset($_GET['name'])){
                        $name=$_GET['name'];
                    }
                    $status=null;
                    if(isset($_GET['status'])){
                        $status=$_GET['status'];
                    }
                    $type=null;
                    if(isset($_GET['type'])){
                        $type=$_GET['type'];
                    }
                @endphp
                {{ Form::open(['method'=>'get','class'=>'search flex-wrap flex-md-nowrap']) }}
                {{ Form::text('name',$name,['class'=>'form-control','placeholder'=>'Transaction Head Name']) }}
                {{ Form::select('type',['Income'=>'Income','Expense'=>'Expense'],$type,['class'=>'form-control','placeholder'=>'Select Transaction Type']) }}
                {{ Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],$status,['class'=>'form-control','placeholder'=>'Select Status']) }}
                <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                {{ Form::close() }}




            </div>
        </div>
        <!-- Records Header End -->
    </div>
    <div class="panel">
        <!-- Records List Start -->
        <div class="table-responsive">
            <h3 style="text-align: center;color:#1b4b72">Transaction Head List</h3>
            <table class="table table-striped custom-table m-b-0 datatable">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th class="not-sortable">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($transaction_heads as $transaction_head)
                    <tr>
                        <td>{{ $serial++ }}</td>
                        <td>{{ $transaction_head->type }}</td>
                        <td>{{ $transaction_head->name }}</td>
                        <td>{{ $transaction_head->status }}</td>

                        <td>
                            <div class="dropleft">
                                <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                <div class="dropdown-menu">
                                    <a href="{{ route('transaction-head.edit',$transaction_head->id) }}" class="dropdown-item">Edit</a>
                                    <a href="#" class="dropdown-item" onclick="return confirm('Delete All infromation from this record.')">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $transaction_heads->links() }}

        </div>
        <!-- Records List End -->
    </div>

@endsection
