@extends('backend.layouts.master_tem')

@section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('doctorSchedules.index')}}">List of Doctor Schedule</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Enter the Schedule of a Doctor</h1>

            {!! Form::open(['route'=>'doctorSchedules.store']) !!}

            <div class="form-row">
                <div class="col-4 text-right ">
                    <h6> {!! Form::label('doctor_id','Doctor') !!} </h6>
                </div>
                <div class="form-group col-4 text-center" >
                    {!! Form::select('doctor_id',$doctors,Null,['placeholder'=>'Select Doctor','class'=>'form-control','required'] )!!}
                </div>
            </div>

            @include('backend.admin.doctorSchedules.form')

            <br>
            <div class="form-row">
                <div class="col-12 text-center">
                    {!! Form::submit('Submit',['class'=>['btn','btn-primary'] ,'id'=>'form_button']) !!}
                </div>
            </div>
            {!! Form::close() !!}

        </div>

@endsection
