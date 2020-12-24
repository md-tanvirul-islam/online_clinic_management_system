@extends('backend.layouts.master_tem')

@section('title', 'Edit Appointment Info')

@section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('appointments.index')}}">List of Appointments</a>
            </div>
           
            <h1 style="text-align:center;margin-bottom: 40px">Edit the Appointment info</h1>


            {!! Form::model($appointment,['route'=>['appointments.update',$appointment->id],'method' => 'put']) !!}
            <div class="form-row">
                <div class="col-6">
                    <div class="row">
                        <div class="col">
                            <b>Appointment Schedule </b><br>
                            Doctor : {{ $doctor->name }} {!! Form::text('doctor_id',$doctor->id,['hidden','required']) !!}<br>
                            Day : Monday <br>
                            Starting Time : 08:00 PM <br>
                            Ending TIme : 10:00 PM <br><br>
                        </div>
                    </div>
                    @php
                    $gender = config('constant.gender')    
                    @endphp
                    <div class="row">
                        <div class="col">
                           <b> Patient Info </b> <br>
                           Name : {!! Form::text('name',$patient->name,['placeholder'=>"Enter Patient Name",'class'=>'form-control','required']) !!}<br>
                           Phone : {!! Form::text('phone',$patient->phone,['placeholder'=>"Enter Patient Phone Number",'class'=>'form-control','required']) !!} <br>
                           Age : {!! Form::text('age',$patient->age,['placeholder'=>"Enter Patient Age",'class'=>'form-control']) !!} <br>
                           Gender : {!! Form::select('gender',$gender,$patient->gender,['placeholder'=>"Select Gender",'class'=>'form-control','required'] )!!} <br><br>

                        </div>
                    </div>
                </div>
                <div class="col-6 text-center">
                    <div class="row">
                        <div class="col">
                            <b>Appointment Date </b>
                        </div>
                        <div class="col">
                            {{ $appointment->date }}
                            {!! Form::date('date',null,['hidden','required']) !!} 
                            <br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <b>Patitent Status </b>
                        </div>
                        <div class="col"> 
                            {!! Form::select('patient_status',['new'=>'Visit after 30 Days','old'=>'Visit in 30 Days','report'=>'Report'],Null,['placeholder'=>"Select Patient",'class'=>'form-control','required'] )!!} <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <b>Fee:</b>
                        </div>
                        <div class="col">
                            {{ $appointment->fee }} <br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <b>Is Paid ?</b>
                        </div>
                        <div class="col">
                            {{ Form::label('is_paid','Yes') }}
                            {{ Form::radio('is_paid', 'yes',$appointment['is_paid']=="yes" ? true : "") }}
                            {{ Form::label('is_paid','No') }}
                            {{ Form::radio('is_paid', 'no',$appointment['is_paid']=="no" ? true : "") }}
                        </div>
                    </div>
                    <br><br><br><br><br><br><br><br><br><br>
                    <div class="row">
                        <div class="col">
                            {!! Form::submit('Update',['class'=>['btn','btn-primary'] ]) !!}
                        </div>
                    </div>
                </div>
            </div>

            
        </div>

        {!! Form::close() !!}

    </div>

@endsection

