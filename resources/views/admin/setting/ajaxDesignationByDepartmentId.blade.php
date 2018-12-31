<div class="form-group">
    <label>
        <span class="label-text">Designation Name</span><span class="text-danger">*</span>
        {{ Form::select('designation_id',$designations,null,['class'=>'form-control','id'=>'designationId','placeholder'=>'Select Designation Name','required']) }}

    </label>
</div>