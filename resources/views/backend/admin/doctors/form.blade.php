<div class="form-row">
    <div class="col-4 text-right ">
        <h6> {!! Form::label('name','Doctor Name:') !!} </h6>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-4 text-right ">
        <h6> {!! Form::label('email','Email Name:') !!} </h6>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::email('email',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-4 text-right ">
        <h6> {!! Form::label('department_id','Department:') !!} </h6>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::select('department_id',$departments,Null,['placeholder'=>'Select One','class'=>'form-control','required'] )!!}
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
        <h6> {!! Form::label('mobileNo','Phone Number:') !!} </h6>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::text('mobileNo',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-4 text-right ">
        <h6> {!! Form::label('phoneNo','Telephone or Another Phone Number:') !!} </h6>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::text('phoneNo',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-4 text-right ">
        <h6> {!! Form::label('speciality','Specialities:') !!} </h6>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::text('speciality',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-4 text-right ">
        <h6> {!! Form::label('degree','Degrees:') !!} </h6>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::text('degree',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-4 text-right ">
        <h6> {!! Form::label('bio','Short Bio:') !!} </h6>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::text('bio',null,['class'=>'form-control','required']) !!}
    </div>
</div>
<br>
<div class="form-row">
    <div class="col-4 text-right">
        <h6> {!! Form::label('gender','Gender:') !!} </h6>
    </div>

    <div class="col-4">
        {!! Form::select('gender',['male'=>'Male','female'=>'Female','other'=>'Other'],Null,['placeholder'=>'Select One','class'=>'form-control','required'] )!!}
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
<div class="form-row">
    <div class="col-4 text-right">
        <h6> {!! Form::label('feeNew','New Patient Consultation Fee:') !!} </h6>
    </div>

    <div class="col-4">
        {!! Form::text('feeNew',null,['class'=>'form-control','required']) !!}
    </div>

</div>

<div class="form-row">
    <div class="col-4 text-right">
        <h6> {!! Form::label('feeInMonth','Consultation Fee(same Month):') !!} </h6>
    </div>

    <div class="col-4">
        {!! Form::text('feeInMonth',null,['class'=>'form-control','required']) !!}
    </div>

</div>

<div class="form-row">
    <div class="col-4 text-right">
        <h6> {!! Form::label('feeReport','Consultation Fee for Report:') !!} </h6>
    </div>

    <div class="col-4">
        {!! Form::text('feeReport',null,['class'=>'form-control','required']) !!}
    </div>

</div>
