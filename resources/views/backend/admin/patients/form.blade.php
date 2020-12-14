<div class="form-row">
    <div class="col-4 text-right ">
        <h6> {!! Form::label('name','Patient Name:') !!} </h6>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-4 text-right ">
        <h6> {!! Form::label('email','Email :') !!} </h6>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::email('email',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-4 text-right ">
        <h6> {!! Form::label('address','Address:') !!} </h6>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::text('address',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-4 text-right ">
        <h6> {!! Form::label('birthDate','Date of Birth:') !!} </h6>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::date('birthDate',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-4 text-right ">
        <h6> {!! Form::label('phone','Phone Number:') !!} </h6>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::text('phone',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-4 text-right">
         Gender: 
    </div>

    <div class="col-8">
        <div class="row">
            <div class="col-2">
                {!! Form::label('gender','Male:') !!}
                {!! Form::radio('gender','male',['class'=>'form-control','required'] )!!}
            </div>
            <div class="col-2">
                {!! Form::label('gender','Female:') !!}
                {!! Form::radio('gender','female',['class'=>'form-control','required'] )!!}
            </div>
            <div class="col-2">
                {!! Form::label('gender','Other:') !!}
                {!! Form::radio('gender','other',['class'=>'form-control','required'] )!!}
             
            </div>
        </div>
    </div>
</div>
<br>

<div class="form-row">
    <div class="col-4 text-right">
        <h6> {!! Form::label('bloodGroup','Blood Group:') !!} </h6>
    </div>

    <div class="col-4">
        {!! Form::select('bloodGroup',['A+'=>'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','AB+'=>'AB+','AB-'=>'AB-','O+'=>'O+','O-'=>'O-'],Null,['placeholder'=>'Select One','class'=>'form-control','required'] )!!}
    </div>

</div>
<br>

