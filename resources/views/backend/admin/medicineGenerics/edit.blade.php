@extends('backend.layouts.master_tem')

@section('title', 'Department Info Edit')
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
        <div class="card" style="color: black; margin-top:10px; margin-left:25%; width: 50%;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="card-title">Edit the Generic Name of the Medicine</h3>
                                <p class="card-text"><small>  Please write a valid Generic Name of the Medicine</small></p>
                            </div>
                            <div class="col-3" style="text-align: right">
                                <a class="btn btn-warning" style="color: black" href="{{route('medicineGenerics.index')}}" title="List of Departments">
                                    <i class="fa fa-list-ol"></i> List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                {!! Form::model($medicineGeneric,[
                                    'route'=>['medicineGenerics.update',$medicineGeneric->id],
                                    'method' => 'put'
                                    ]) !!}
        

                                    
                                @include('backend.admin.medicineGenerics.form')
    
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3" style="text-align: left"> 
                                            <button  style= "color:white" class="btn btn-info" > <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit </button>
                                        </div>
                                        <div class="col-md-4 mb-3"> </div>
                                        <div class="col-md-4 mb-3"> </div>
                                        
                                    </div>
                                
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection

