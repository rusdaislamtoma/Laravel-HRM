<div class="form-group">
    <label>
        <span class="label-text">Transaction Head</span><span class="text-danger">*</span>
        {{ Form::select('transaction_head_id',$transaction_heads,null,['class'=>'form-control','required','placeholder'=>'Select Transaction Head']) }}

    </label>
</div>

<div class="form-group">
    <label>
        <span class="label-text">Client Name</span><span class="text-danger">*</span>
        {{ Form::text('client_name',null,['class'=>'form-control','required','placeholder'=>'Enter Client Name']) }}

    </label>
</div>
<div class="form-group">
    <label>
        <span class="label-text">Description</span><span class="text-danger">*</span>
        {{ Form::textarea('description',null,['class'=>'form-control','required','placeholder'=>'Enter Description']) }}

    </label>
</div>
<div class="form-group">
    <label>
        <span class="label-text">Date</span><span class="text-danger">*</span>
        {{ Form::date('date',null,['class'=>'form-control','required']) }}

    </label>
</div>

<div class="form-group">
    <label>
        <span class="label-text">Amount</span><span class="text-danger">*</span>
        {{ Form::number('amount',null,['class'=>'form-control','step'=>'.01','required','placeholder'=>'Please enter amount']) }}

    </label>
</div>

