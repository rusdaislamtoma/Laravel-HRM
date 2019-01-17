@extends('admin.layouts.master')
@section('contentBody')
    <div class="panel" style="overflow:auto;">
        <!-- Records Header Start -->
        <div class="records--header">


            <div class="actions mx-auto">

                {{ Form::model(request(),['method'=>'get','class'=>'search flex-wrap flex-md-nowrap']) }}
                {{ Form::date('date',null,['class'=>'form-control','placeholder'=>'Date']) }}
                {{ Form::select('status',['Present'=>'Present','Absent'=>'Absent'],null,['class'=>'form-control','placeholder'=>'Select Status']) }}
                <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                {{ Form::close() }}

                <a href="{{ route('attendance.upload') }}" class="addProduct btn btn-lg btn-rounded btn-warning"><i class="fa fa-plus"></i>Upload Bulk Attendance</a>


            </div>
        </div>
        <!-- Records Header End -->
    </div>
    <div class="panel">
        <!-- Records List Start -->
        <div class="table-responsive">
            <h3 style="text-align: center;color:#1b4b72">Attendance List</h3>
            <table class="table table-striped custom-table m-b-0 datatable">

                <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>

                @foreach($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->date }}</td>
                        <td><a href="{{ route('attendance.show',$attendance->relUser->id) }}">{{ $attendance->relUser->name }}</a></td>
                        <td>
                            {{ $attendance->in_time.'-'.$attendance->out_time }}
                        </td>
                        <td>{{ $attendance->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $attendances->links() }}

        </div>
        <!-- Records List End -->
    </div>

@endsection
