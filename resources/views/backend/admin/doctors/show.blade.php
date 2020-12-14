@extends('backend.layouts.master_tem')
@section('title', 'Department Details')
@section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('doctors.index')}}">List of Doctors</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Details of Doctor {{ $doctor->name }}</h1>


            {!! Form::model($doctor) !!}
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
                    {!! Form::select('department_id',$departments,Null,['placeholder'=>'Select One','class'=>'form-control','disabled'] )!!}
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
                    {!! Form::date('birthDate',null,['class'=>'form-control','disabled']) !!}
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
                    {!! Form::textarea('bio',null,['class'=>'form-control','disabled']) !!}
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-4 text-right">
                     Gender: 
                </div>
            
                <div class="col-4">
                    {!! Form::label('gender','Male:') !!}
                    {!! Form::radio('gender','male',['class'=>'form-control','disabled'] )!!}
                    {!! Form::label('gender','Female:') !!}
                    {!! Form::radio('gender','female',['class'=>'form-control','disabled'] )!!}
                    {!! Form::label('gender','Other:') !!}
                    {!! Form::radio('gender','other',['class'=>'form-control','disabled'] )!!}
                 
                </div>
            </div>
            <div class="form-row">
                <div class="col-4 text-right">
                    <h6> {!! Form::label('bloodGroup','Blood Group:') !!} </h6>
                </div>
            
                <div class="col-4">
                    {!! Form::select('bloodGroup',['A+'=>'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','AB+'=>'AB+','AB-'=>'AB-','O+'=>'O+','O-'=>'O-'],Null,['placeholder'=>'Select One','class'=>'form-control','disabled'] )!!}
                </div>
            
            </div><br>
            <div class="form-row">
                <div class="col-4 text-right">
                    {!! Form::label('feeNew','New Patient Consultation Fee:') !!} 
                </div>
            
                <div class="col-4">
                    {!! Form::text('feeNew',null,['class'=>'form-control','required']) !!}
                </div>
            
            </div><br>
            
            <div class="form-row">
                <div class="col-4 text-right">
                    {!! Form::label('feeInMonth','Consultation Fee(same Month):') !!} 
                </div>
            
                <div class="col-4">
                    {!! Form::text('feeInMonth',null,['class'=>'form-control','required']) !!}
                </div>
            
            </div><br>
            
            <div class="form-row">
                <div class="col-4 text-right">
                    {!! Form::label('feeReport','Consultation Fee for Report:') !!} 
                </div>
            
                <div class="col-4">
                    {!! Form::text('feeReport',null,['class'=>'form-control','required']) !!}
                </div>
            </div><br>
            
            <div>
                    <img src='{{ asset("$doctor->image") }}' >
            </div>
            
            {!! Form::close() !!}

    </div>

@endsection

