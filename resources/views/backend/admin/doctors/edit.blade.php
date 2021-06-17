@extends('backend.layouts.master_tem')
@section('title', 'Doctor Info Edit')
@push('css')
<style>
    input, select, option, textarea{
        color: #000000 !important;
        font-weight: bold !important;
        border-color: #000000  !important;
        border-style: solid !important;
        border-width: 1px !important;
    }
    textarea:focus, input:focus {
        color: #000000c5 !important;
        font-weight: bold !important;
    }
    input::placeholder, textarea::placeholder{
        color: #000000b2 !important;
        /* font-weight: bold !important; */
    }
</style>
@endpush

@section('content')
        <div class="container">
            <div class="card" style="color: black; margin-top:10px;  width: 100%;">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <h3 class="card-title">Edit the Doctor Account info </h3>
                                    <p class="card-text"><small> Please enter valid doctor info</small></p>
                                </div>
                                <div class="col-3" style="text-align: right">
                                    <a class="btn btn-warning" style="color: black" href="{{route('doctors.index')}}" title="List of Departments">
                                        <i class="fa fa-list-ol"></i> List
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    {!! Form::model($doctor,[
                                        'route'=>['doctors.update',$doctor->id],'files'=>true,
                                        'method' => 'put'
                                        ]) !!}

                                        
                                    @include('backend.admin.doctors.form')
        

                                        <div class="form-row">
                                            <div class="col-3">
                                                @if (isset($doctor->image))
                                                <div> 
                                                    {!! Form::label('image','Change the Profile photo:') !!}
                                                </div>
                                                @else
                                                    <div> 
                                                        {!! Form::label('image','Please Upload a Profile photo:') !!}
                                                    </div>
                                                @endif 
                                            </div>
                                            <div class="col-5"> 
                                                {!! Form::file('image') !!}
                                            </div>
                                            @if (isset($doctor->image))
                                                <div class="col-4"> 
                                                    <img src='{{ asset("$doctor->image") }}' style="width: 200px;height:300px" >
                                                </div>
                                            @else
                                                <div class="col-4"> 
                                                    <p class="text-danger"> <b> Profile Photo has not uploaded yet!! </b> </p>
                                                </div>
                                            @endif
                                        </div>
                                        <br>
                                        <div class="form-row">
                                           
                                            <div class="col-md-12 mb-3" style="text-align: center"> 
                                                <button  style= "color:white" class="btn btn-info" > <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit </button>
                                            </div>
                                        </div>
                                    
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
            </div>
        </div>

@endsection