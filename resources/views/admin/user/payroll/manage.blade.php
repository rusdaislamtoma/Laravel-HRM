@extends('admin.layouts.master')
@section('contentBody')
    <div class="row gutter-20">
        <div class="col-md-8 mx-auto">
        {{ Form::model($payroll,['route'=>['payroll.update',$user_id],'method'=>'PUT']) }}
        <!-- Panel Start -->
            <div class="panel">
                <div class="panel-heading p-sm-4">
                    <h3 class="panel-title text-primary" style="font-size: 25px;">Payroll Entry or Update Form</h3>
                </div>
                @include('admin.layouts._validation_messages')

                <div class="panel-content">
                    <fieldset>
                        <legend style="color:#1b4b72">Payroll Information</legend>
                        <div class="form-group">
                            <label>
                                <span class="label-text">Basic</span><span class="text-danger">*</span>
                                {{ Form::number('basic',null,['class'=>'form-control','required','step'=>'.01','placeholder'=>'Enter Basic Salary']) }}

                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <span class="label-text">House Rent</span><span class="text-danger">*</span>
                                {{ Form::number('house_rent',null,['class'=>'form-control','required','step'=>'.01','placeholder'=>'Enter House Rent']) }}

                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <span class="label-text"> Medical Allowance</span><span class="text-danger">*</span>
                                {{ Form::number('medical',null,['class'=>'form-control','required','step'=>'.01','placeholder'=>'Enter Medical Allowance']) }}

                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                <span class="label-text">Travel Allowance</span><span class="text-danger">*</span>
                                {{ Form::number('travel_allowance',null,['class'=>'form-control','required','step'=>'.01','placeholder'=>'Enter Travel Allowance']) }}

                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                <span class="label-text">Daily Allowance</span><span class="text-danger">*</span>
                                {{ Form::number('daily_allowance',null,['class'=>'form-control','required','step'=>'.01','placeholder'=>'Enter Daily Allowance']) }}

                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                <span class="label-text">Provident Fund</span><span class="text-danger">*</span>
                                {{ Form::number('provident_fund',null,['class'=>'form-control','required','step'=>'.01','placeholder'=>'Enter Provident Fund']) }}

                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                <span class="label-text">Gross</span><span class="text-danger">*</span>
                                {{ Form::number('gross',null,['class'=>'form-control','required','step'=>'.01','placeholder'=>'Enter Gross Salary']) }}

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

@section('scripts')
    @include('admin.user._scripts')
@endsection