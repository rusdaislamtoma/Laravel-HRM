@extends('admin.layouts.master')
@section('contentBody')
    <div class="row gutter-20">
        <div class="col-md-8 mx-auto">
        {{ Form::open(['route'=>'user.store','files'=>true]) }}
        <!-- Panel Start -->
            <div class="panel">
                <div class="panel-heading" style="padding: 30px 220px">
                    <h3 class="panel-title text-primary" style="font-size: 25px">User Entry Form</h3>
                </div>
                @include('admin.layouts._validation_messages')

                <div class="panel-content">
                    @include('admin.user._form')

                    <input type="submit" name="submit" value="Submit" id="createUser" class="btn btn-sm btn-rounded btn-success"/>
                    <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-rounded btn-danger" />

                </div>
            </div>
        {{ Form::close() }}
        <!-- Panel End -->
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.user._scripts')
@endsection
