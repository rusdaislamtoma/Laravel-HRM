@extends('admin.layouts.master')
@section('contentBody')
    <div class="row gutter-20">
        <div class="col-md-8 mx-auto">
        {{ Form::model($department,['route'=>['department.update',$department->id],'method'=>'PUT']) }}
        <!-- Panel Start -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Department Update Form</h3>
                </div>

                <div class="panel-content">
                    @include('admin.department._form')

                    <input type="submit" name="submit" value="Submit" class="btn btn-sm btn-rounded btn-success"/>
                    <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-rounded btn-danger" />

                </div>
            </div>
        {{ Form::close() }}
        <!-- Panel End -->
        </div>
    </div>
@endsection

