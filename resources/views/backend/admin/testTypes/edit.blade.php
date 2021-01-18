@extends('backend.layouts.master_tem')

@Section('title','Test Type Update')

@section('content')

<div class="container-fluid">
            <div class="card" style="color: black; margin-top:10px">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h3 class="card-title">Edit the Category Name of this Test</h3>
                            <p class="card-text"><small> Please write a meaningful and reuseable name of the tests' category </small></p>
                        </div>
                        <div class="col-3" style="text-align: right">
                            <a class="btn btn-warning" style="color: black" href="{{route('testTypes.index')}}" title="List of All Test Types">
                                <i class="fa fa-list-ol"></i> List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            {!! Form::model($testType,['route' => ['testTypes.update',$testType->id],'method' =>'put']) !!}
            
                                
                            @include('backend.admin.testTypes.form')
        
                                <div class="form-row">
                                    <div class="col-md-4 mb-3"> </div>
                                    <div class="col-md-4 mb-3" style="text-align: center"> 
                                        <button  style= "color:white" class="btn btn-info" > <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit </button>
                                    </div>
                                    <div class="col-md-4 mb-3"> </div>
                                    
                                </div>
                            
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
</div>
   

@endsection

