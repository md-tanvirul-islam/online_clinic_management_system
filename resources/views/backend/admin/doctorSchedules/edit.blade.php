@extends('backend.layouts.master_tem')

@section('title', 'Department Info Edit')

@section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('doctorSchedules.index')}}">List of doctorSchedules</a>
            </div>
            @php
                 $doctor = App\Models\Doctor::find($doctorSchedule->doctor_id);
            @endphp
            <h1 style="text-align:center;margin-bottom: 40px">Edit the Schedule of Doctor {{ $doctor->name }}</h1>


            {!! Form::model($doctorSchedule,[
                            'route'=>['doctorSchedules.update',$doctorSchedule->id],'files'=>true,
                            'method' => 'put'
                            ]) !!}



            {{-- {!! Form::select('doctor_id',$doctors,Null,['placeholder'=>'Select Doctor','class'=>'form-control','required',hidden] )!!} --}}
 
                            

            @include('backend.admin.doctorSchedules.form')
            <br>
            <div class="form-row">
                <div class="col-12 text-center">
                    {!! Form::submit('Update',['class'=>['btn','btn-primary'] ]) !!}
                </div>
            </div>


        </div>

        {!! Form::close() !!}

    </div>

@endsection

