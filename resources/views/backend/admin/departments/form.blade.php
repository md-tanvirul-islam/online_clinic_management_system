<div class="form-row">
    <div class="col-4 text-right ">
        <h4> {!! Form::label('name','Department Name:') !!} </h4>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-4 text-right">
        <h4> Is Active: </h4>
    </div>

    <div class="col-4">
        {!! Form::label('is_active','Yes:') !!}
        {!! Form::radio('is_active','yes',['class'=>'form-control','required'] )!!}
        {!! Form::label('is_active','No:') !!}
        {!! Form::radio('is_active','no',['class'=>'form-control','required'] )!!}
     
    </div>

</div>

<div class="form-row">
    <div class="col-4 text-right">
        <h4> {!! Form::label('description','Description:') !!} </h4>
    </div>

    <div class="col-4">
        {!! Form::textarea('description',null,['class'=>'form-control',]) !!}
    </div>

</div>
