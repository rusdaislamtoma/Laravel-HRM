<div class="form-group">
    <label>
        <span class="label-text">Transaction Type</span><span class="text-danger">*</span>
        {{ Form::select('type',['Income'=>'Income','Expense'=>'Expense'],null,['class'=>'form-control','required','placeholder'=>'Select Transaction Type']) }}

    </label>
</div>

<div class="form-group">
    <label>
        <span class="label-text">Transaction Head Name</span><span class="text-danger">*</span>
        {{ Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Enter Transaction Head Name...']) }}

    </label>
</div>


<div class="form-group form-inline">
    <label>
        <span class="label-text">Status</span><span class="text-danger">* &nbsp;&nbsp;</span>
        {{ Form::radio('status','Active',null,['required','checked']) }}
        {{ Form::label('status1','Active') }}<span> &nbsp;&nbsp;</span>

        {{ Form::radio('status','Inactive',null,['required']) }}
        {{ Form::label('status2','Inactive') }}


    </label>
</div>