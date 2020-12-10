@extends('backend.layouts.master_tem')

@section('title', 'Department Info Edit')

@section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('departments.index')}}">List of Divisions</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Edit the info of The Department</h1>


            {!! Form::model($department,[
                            'route'=>['departments.update',$department->id],
                            'method' => 'put'
                            ]) !!}

            @include('backend.admin.departments.form')

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

