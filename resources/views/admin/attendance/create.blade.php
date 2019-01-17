@extends('admin.layouts.master')
@section('contentBody')
    <div class="row gutter-20">
        <div class="col-md-8 mx-auto">
        {{ Form::open(['route'=>['attendance.store'],'files'=>true]) }}
        <!-- Panel Start -->
            <div class="panel">
                <div class="panel-heading p-sm-4">
                    <h3 class="panel-title text-primary" style="font-size: 25px;">Upload Bulk Attendance</h3>
                </div>
                @include('admin.layouts._validation_messages')

                <div class="panel-content">
                    <fieldset>

                        <div class="form-group">
                            <label>
                                <span class="label-text">Attendance File</span><span class="text-danger">*</span>
                                {{ Form::file('attendance_file',['class'=>'form-control']) }}

                            </label>
                        </div>

                    </fieldset>

                    <input type="submit" name="submit" value="Submit" id="createUser" class="btn btn-sm btn-rounded btn-success"/>
                    <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-rounded btn-danger" />

                </div>
            </div>
        {{ Form::close() }}
        <!-- Panel End -->
        </div>
    </div>
@endsection
