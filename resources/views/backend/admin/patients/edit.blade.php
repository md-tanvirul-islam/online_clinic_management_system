@extends('backend.layouts.master_tem')

@section('title', 'Patient Info Edit')

{{-- @section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('patients.index')}}">List of patients</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Edit the info of patient {{ $patient->name }}</h1>


            {!! Form::model($patient,['route'=>['patients.update',$patient->id],'files'=>true,
                            'method' => 'put'
                            ]) !!}

            @include('backend.admin.patients.form')

            <div class="form-row">
                <div class="col-4 text-right">
                    {!! Form::label('image','Change Profile photo:') !!} 
                </div>
                <div class="col-4 text-right"> 
                    {!! Form::file('image') !!}
                </div>
                <div class="col-4"> 
                    <img src='{{ asset("$patient->image") }}' style="width: 200px;height:200px" >
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

@endsection --}}

@extends('backend.layouts.master_tem')

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
                                    <h3 class="card-title">Edit the patient {{ $patient->name }} Account info </h3>
                                    <p class="card-text"><small> Please enter valid patient info</small></p>
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
                                    {!! Form::model($patient,['route'=>['patients.update',$patient->id],'files'=>true,
                                    'method' => 'put'
                                    ]) !!}

                                        
                                    @include('backend.admin.patients.form')
        

                                        <div class="form-row">
                                            <div class="col-3">
                                                @if (isset($patient->image))
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
                                            @if (isset($patient->image))
                                                <div class="col-4"> 
                                                    <img src='{{ asset("$patient->image") }}' style="width: 200px;height:300px" >
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

