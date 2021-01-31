@extends('backend.layouts.master_tem')

{{-- @section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('patients.index')}}">List of patients</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Enter the info of a Patient</h1>

            {!! Form::open(['route'=>'patients.store','files'=>true]) !!}

            @include('backend.admin.patients.form')

            <div class="form-row">
                <div class="col-4 text-right">
                    {!! Form::label('image','Upload Profile Image:') !!} 
                </div>
                <div class="col-4 text-right"> 
                    {!! Form::file('image') !!}
                </div>
            </div>

            <br>
            <div class="form-row">
                <div class="col-12 text-center">
                    {!! Form::submit('Submit',['class'=>['btn','btn-primary'] ]) !!}
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
                                    <h3 class="card-title">Create a Patient Account </h3>
                                    <p class="card-text"><small> Please enter valid Patient info</small></p>
                                </div>
                                <div class="col-3" style="text-align: right">
                                    <a class="btn btn-warning" style="color: black" href="{{route('patients.index')}}" title="List of Patients">
                                        <i class="fa fa-list-ol"></i> List
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    {!! Form::open(['route'=>'patients.store','files'=>true]) !!}

                                        
                                    @include('backend.admin.patients.form')

                                        <div class="form-row">
                                            <div class="col-4 text-right">
                                                {!! Form::label('image','Upload Profile Image:') !!} 
                                            </div>
                                            <div class="col-4 text-right"> 
                                                {!! Form::file('image') !!}
                                            </div>
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