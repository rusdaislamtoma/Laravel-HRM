@extends('admin.layouts.master')
@section('contentBody')
    <div class="row gutter-20">
        <div class="col-md-8 mx-auto">
            {{ Form::open(['route'=>'designation.store']) }}
                <!-- Panel Start -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title text-primary" style="font-size: 25px">Designation Entry Form</h3>
                    </div>
                    @include('admin.layouts._validation_messages')

                    <div class="panel-content">
                      @include('admin.designation._form')

                        <input type="submit" name="submit" value="Submit" class="btn btn-sm btn-rounded btn-success"/>
                        <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-rounded btn-danger" />

                    </div>
                </div>
            {{ Form::close() }}
            <!-- Panel End -->
        </div>
    </div>
@endsection
