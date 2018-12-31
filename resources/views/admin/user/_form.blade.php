
<fieldset>
    <legend style="color:#1b4b72">Personal Information</legend>
    <div class="form-group">
        <label>
            <span class="label-text">Name</span><span class="text-danger">*</span>
            {{ Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Enter User Name...']) }}

        </label>
    </div>
    <div class="form-group">
        <label>
            <span class="label-text">Date of Birth</span>
            {{ Form::date('dob',null,['class'=>'form-control']) }}

        </label>
    </div>
    <div class="form-group">
        <label>
            <span class="label-text">Contact Number</span><span class="text-danger">*</span>
            {{ Form::text('contact_no',null,['class'=>'form-control','required']) }}

        </label>
    </div>
    <div class="form-group">
        <label>
            <span class="label-text">Address</span>
            {{ Form::textarea('address',null,['class'=>'form-control']) }}

        </label>
    </div>
    <div class="form-group">
        <label>
            <span class="label-text">Image</span>
            {{ Form::file('image',['class'=>'form-control']) }}

        </label>
    </div>
</fieldset>
<br/><br/>



<fieldset>
    <legend style="color:#1b4b72">Official Information</legend>
    <div class="form-group">
        <label>
            <span class="label-text">User Type</span><span class="text-danger">*</span>
            {{ Form::select('type',['Admin'=>'Admin','Employee'=>'Employee'],null,['class'=>'form-control','placeholder'=>'Select User Type','required']) }}

        </label>
    </div>
    <div class="form-group">
        <label>
            <span class="label-text">Department Name</span><span class="text-danger">*</span>
            {{ Form::select('department_id',$departments,null,['class'=>'form-control','id'=>'departmentId','placeholder'=>'Select Department Name','required']) }}

        </label>
    </div>
    <div class="form-group">
        <label>
            <span class="label-text">Designation Name</span><span class="text-danger">*</span>
            {{ Form::select('designation_id',$designations,null,['class'=>'form-control','id'=>'designationDiv','placeholder'=>'Select Designation Name','required']) }}

        </label>
    </div>
</fieldset>
<br/><br/>

<fieldset>
    <legend style="color:#1b4b72">Login Information</legend>
    <div class="form-group">
        <label>
            <span class="label-text">Email</span><span class="text-danger">*</span>
            {{ Form::email('email',null,['class'=>'form-control','required']) }}

        </label>
    </div>
    @php
        $required = 'required';
         if(isset($user)){
             $required=null;
         }

    @endphp

    <div class="form-group">
        <label>
            <span class="label-text">Password</span>@if(!isset($user))<span class="text-danger">*</span>@endif
            {{ Form::password('password',['class'=>'form-control','id'=>'password',$required ]) }}

        </label>
    </div>
    <div id="messageDiv" style="color: red"></div>
    <div class="form-group">
        <label>
            <span class="label-text">Confirm Password</span>@if(!isset($user))<span class="text-danger">*</span>@endif
            {{ Form::password('password_confirmation',['class'=>'form-control','id'=>'confirmPassword',$required ]) }}

        </label>
    </div>

</fieldset>

<div class="form-group form-inline">
    <label>
        <span class="label-text">Status</span><span class="text-danger">* &nbsp;&nbsp;</span>
        {{ Form::radio('status','Active',null,['required','checked']) }}
        {{ Form::label('status1','Active') }}<span> &nbsp;&nbsp;</span>

        {{ Form::radio('status','Inactive',null,['required']) }}
        {{ Form::label('status2','Inactive') }}


    </label>
</div>

