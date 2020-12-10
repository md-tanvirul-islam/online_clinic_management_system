@extends('backend.layouts.master_tem')

@section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('doctors.index')}}">List of Departments</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Enter a Name of Department</h1>

            {!! Form::open(['route'=>'doctors.store']) !!}

            @include('backend.admin.doctors.form')

            <br>
            <div class="form-row">
                <div class="col-12 text-center">
                    {!! Form::submit('Submit',['class'=>['btn','btn-primary'] ]) !!}
                </div>
            </div>


            {!! Form::close() !!}

        </div>

@endsection
