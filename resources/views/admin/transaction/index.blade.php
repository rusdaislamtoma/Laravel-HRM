@extends('admin.layouts.master')
@section('contentBody')
    <div class="panel" style="overflow:auto;">
        <!-- Records Header Start -->
        <div class="records--header">
            <div class="col-sm-12 text-right m-b-30">
                <a href="{{ route('transaction.create',$transaction_type) }}" class="addProduct btn btn-lg btn-rounded btn-warning"><i class="fa fa-plus"></i> Add New {{ $transaction_type }}</a>

            </div>

            <div class="actions mx-auto">
                @php
                    $transaction_id=null;
                    if(isset($_GET['transaction_id'])){
                        $transaction_id=$_GET['transaction_id'];
                    }
                    $client_name=null;
                    if(isset($_GET['client_name'])){
                        $client_name=$_GET['client_name'];
                    }
                    $transaction_head_id=null;
                    if(isset($_GET['transaction_head_id'])){
                        $transaction_head_id=$_GET['transaction_head_id'];
                    }
                @endphp
                {{ Form::open(['method'=>'get','class'=>'search flex-wrap flex-md-nowrap']) }}
                {{ Form::text('transaction_id',$transaction_id,['class'=>'form-control','placeholder'=>'Transaction ID']) }}
                {{ Form::text('client_name',$client_name,['class'=>'form-control','placeholder'=>'Client Name']) }}
                {{ Form::select('transaction_head_id',$transaction_heads,$transaction_head_id,['class'=>'form-control','placeholder'=>'Select Transaction Head']) }}
                <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                {{ Form::close() }}




            </div>
        </div>
        <!-- Records Header End -->
    </div>
    <div class="panel">
        <!-- Records List Start -->
        <div class="table-responsive">
            <h3 style="text-align: center;color:#1b4b72">{{ $heading }}</h3>
            <table class="table table-striped custom-table m-b-0 datatable">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Transaction ID</th>
                    <th>Head</th>
                    <th>Client Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th class="not-sortable">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $serial++}}</td>
                        <td>{{ $transaction->transaction_id }}</td>
                        <td>{{ $transaction->relTransactionHead->name }}</td>
                        <td>{{ $transaction->client }}</td>
                        <td>{{ date('d M Y',strtotime($transaction->date)) }}</td>
                        <td>{{ $transaction->amount }}</td>

                        <td>
                            <div class="dropleft">
                                <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Edit</a>
                                    <a href="#" class="dropdown-item" onclick="return confirm('Delete All infromation from this record.')">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $transactions->links() }}

        </div>
        <!-- Records List End -->
    </div>

@endsection
