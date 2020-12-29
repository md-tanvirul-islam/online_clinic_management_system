@extends('backend.layouts.master_tem')

@Section('title','Test Type Update')

@section('content')
    

    <div class="container" style="margin-bottom: 20px">
        <div style="text-align: justify">
            <a class="btn btn-secondary" href="{{route('tests.index')}}">TestList</a>
        </div>
        <h1 style="text-align:center;margin-bottom: 40px">Update the {{ $test->name }} Test Info</h1>
        {!! Form::model($test,['route' => ['tests.update',$test->id],'method' =>'put']) !!}
            
            @include('backend.admin.tests.form')

            <div class="row" style="margin-top: 20px">
                <div class="col" style="text-align: center">
                    {!! Form::submit('Submit',['class'=>['btn','btn-primary'] ]) !!}
                </div> 
            </div>
        {!! Form::close() !!}
    </div>

@endsection

