@extends('backend.layouts.master_tem')

@section('title', 'Department Info Edit')

@section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('doctors.index')}}">List of Doctors</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Edit the info of Doctor {{ $doctor->name }}</h1>


            {!! Form::model($doctor,[
                            'route'=>['doctors.update',$doctor->id],'files'=>true,
                            'method' => 'put'
                            ]) !!}

            @include('backend.admin.doctors.form')

            <div class="form-row">
                <div class="col-4 text-right">
                    {!! Form::label('image','Change Profile photo:') !!} 
                </div>
                <div class="col-4 text-right"> 
                    {!! Form::file('image') !!}
                </div>
                <div class="col-4"> 
                    <img src='{{ asset("$doctor->image") }}' style="width: 200px;height:200px" >
                </div>
            </div>

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

