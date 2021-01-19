<div class="form-row">
    <div class="col-md-12 mb-3">
            <label for="name">Enter a Name of the Test Category:</label>
            {!! Form::text('name',null,['class'=>'form-control','required','placeholder' => 'Test Type Name']) !!}
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="description">Description of the Test Category:</label>
        {!! Form::textarea('description',null,['class'=>'form-control','rows'=>'4','cols'=>'50','placeholder' => 'Test Type Description']) !!}
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="status">Status:</label>
                {!! Form::select('status',['active'=>'Active','inactive'=>'Inactive'],null,['class'=>'form-control','required','placeholder' => 'Please Select Status']) !!}
    </div>
</div>