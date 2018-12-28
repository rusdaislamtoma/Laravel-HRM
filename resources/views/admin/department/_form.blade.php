@include('admin.layouts._validation_messages')
<div class="form-group">
    <label>
        <span class="label-text">Department Name</span><span class="text-danger">*</span>
        {{ Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Enter Department Name...']) }}

    </label>
</div>

<div class="form-group">
    <label>
        <span class="label-text">Status</span><span class="text-danger">*</span>
        {{ Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class'=>'form-control','placeholder' => 'Select Department Status...']) }}
    </label>
</div>
