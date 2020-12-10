@extends('backend.layouts.master_tem')
@section('title', 'Department Details')
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
            <div class="form-row">
                <div class="col-4 text-right ">
                    <h4> {!! Form::label('name','Department Name:') !!} </h4>
                </div>
                <div class="form-group col-4 text-center" >
                    {!! Form::text('name',null,['class'=>'form-control','disabled']) !!}
                </div>
            </div>

            <div class="form-row">
                <div class="col-4 text-right">
                    <h4> {!! Form::label('is_active','Is Active:') !!} </h4>
                </div>

                <div class="col-4">
                    {!! Form::text('is_active',null,['class'=>'form-control','disabled']) !!}
                </div>

            </div>

            <div class="form-row">
                <div class="col-4 text-right">
                    <h4> {!! Form::label('description','Description:') !!} </h4>
                </div>

                <div class="col-4">
                    {!! Form::textarea('description',null,['class'=>'form-control','disabled']) !!}
                </div>

            </div>

            {!! Form::close() !!}

    </div>

@endsection

