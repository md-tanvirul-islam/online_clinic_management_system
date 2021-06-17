<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="name">Enter a Department Name::</label>
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder' => 'Department Name']) !!}
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="description">Description of Department:</label>
        {!! Form::textarea('description',null,['class'=>'form-control','rows'=>'4','cols'=>'50','placeholder' => 'Write Department Description!!!']) !!}
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="is_active">Status:</label>
        {!! Form::select('is_active',['yes'=>'Active','no'=>'Inactive'],null,['class'=>'form-control','required','placeholder' => 'Please Select Status']) !!}
    </div>
</div>