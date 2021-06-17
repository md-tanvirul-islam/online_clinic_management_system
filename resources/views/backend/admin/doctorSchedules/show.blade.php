@extends('backend.layouts.master_tem')
@section('title', 'Department Details')
@section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('patients.index')}}">List of Patients</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Details of  Patient {{ $patient->name }}</h1>

            <div class="row">
                <div class="col-4">
                    <div>
                            <img src='{{ asset("$patient->image") }}' style="height: 400px;width:300px" >
                    </div>
                </div>
                <div class="col-8">
                    {!! Form::model($patient) !!}
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
                            <h6> {!! Form::label('phone','Telephone or Another Phone Number:') !!} </h6>
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

                    <div class="form-row">
                        <div class="col-4 text-right">
                            <h6> {!! Form::label('bloodGroup','Blood Group:') !!} </h6>
                        </div>
                    
                        <div class="col-4">
                            {!! Form::select('bloodGroup',['A+'=>'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','AB+'=>'AB+','AB-'=>'AB-','O+'=>'O+','O-'=>'O-'],Null,['placeholder'=>'Select One','class'=>'form-control','disabled'] )!!}
                        </div>
                    
                    </div>
                </div>
                
                {!! Form::close() !!}
            </div>

    </div>

@endsection

