@extends('backend.layouts.master_tem')
@push('css')
<style>
    table,thead, th, td {
            border: 2px solid #696969  !important; 
            }
    table {
            border-collapse: collapse !important;
            }
    td {
        font-size: 20px;
        font-weight: bold;
    }
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
                            <h3 class="card-title">Edit the Role Name for this Application</h3>
                            <p class="card-text"><small> Please write a meaningful and reuseable Role Name for this Application </small></p>
                        </div>
                        <div class="col-3" style="text-align: right">
                            <a class="btn btn-warning" style="color: black" href="{{route('authorization.roles.list')}}" title="List of All Test Types">
                                <i class="fa fa-list-ol"></i> List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            {!! Form::model($role,['route' => ['authorization.roles.update',$role->id],'method' => 'put']) !!}
                                
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="name">Enter the Role Name</label>
                                        {!! Form::text('name',null,['class'=>'form-control','required','placeholder' => 'Role Name']) !!}
                                    </div>
                                </div>

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