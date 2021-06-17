<div class="row">
    <div class="col-6 text-right">
        <b> {!! Form::label('name','Enter a Name of the Test:') !!} </b>
    </div>
    <div class="col-3">
        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
    </div> 
</div><br>
<div class="row">
    <div class="col-6 text-right">
        <b> {!! Form::label('testType_id','Select the Test Category:') !!} </b>
    </div>
    <div class="col-3">
        {!! Form::selectTestType('testType_id',null,['placeholder' => 'Select One','class'=>'form-control','required']) !!}
    </div> 
</div><br>
<div class="row">
    <div class="col-6 text-right">
        <b> {!! Form::label('price','Enter the price of the test:') !!} </b>
    </div>
    <div class="col-3">
        {!! Form::text('price',null,['class'=>'form-control','required']) !!}
    </div> 
</div>