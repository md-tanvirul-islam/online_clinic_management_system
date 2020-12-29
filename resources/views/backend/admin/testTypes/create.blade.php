@extends('backend.layouts.master_tem')

@section('content')
    

    <div class="container" style="margin-bottom: 20px">
        <div style="text-align: justify">
            <a class="btn btn-secondary" href="{{route('testTypes.index')}}">TestTypes</a>
        </div>
        <h1 style="text-align:center;margin-bottom: 40px">Add a Category of Test</h1>
        {!! Form::open(['route' => 'testTypes.store']) !!}
             

            @include('backend.admin.testTypes.form')

            <div class="row" style="margin-top: 20px">
                <div class="col" style="text-align: center">
                    {!! Form::submit('Submit',['class'=>['btn','btn-primary'] ]) !!}
                </div> 
            </div>
        {!! Form::close() !!}
    </div>

@endsection

