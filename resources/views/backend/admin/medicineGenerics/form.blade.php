<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="name">Enter a Generic Name::</label>
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder' => 'Generic Name']) !!}
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="detail">Description of Generic Name:</label>
        {!! Form::textarea('detail',null,['class'=>'form-control','rows'=>'4','cols'=>'50','placeholder' => 'Please WriteGeneric Name Description !!!']) !!}
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="status">Status:</label>
        {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','required','placeholder' => 'Please Select Status']) !!}
    </div>
</div>