@extends('backend.layouts.master_tem')

@section('title', 'Department Info Edit')
@push('css')
<link rel="stylesheet" href="{{ asset('ui/frontend/plugins/select2/css/select2.min.css') }}">
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
    .select2-container .select2-selection--single{
        height:40px !important;
        color: #000000 !important;
        font-weight: bold !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered
    {
        line-height:35px !important;
    }
</style>
@endpush
@section('content')
    <div class="container">
        <div class="card" style="color: black; margin-top:10px;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="card-title">Edit the Generic Name of the Medicine</h3>
                                <p class="card-text"><small>  Please write a valid Generic Name of the Medicine</small></p>
                            </div>
                            <div class="col-3" style="text-align: right">
                                <a class="btn btn-warning" style="color: black" href="{{route('medicines.index')}}" title="List of Departments">
                                    <i class="fa fa-list-ol"></i> List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                {!! Form::model($medicine,[
                                    'route'=>['medicines.update',$medicine->id],
                                    'method' => 'put'
                                    ]) !!}
        

                                    
                                @include('backend.admin.medicines.form')
    
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

@push('js')

<script src="{{ asset('ui/frontend/plugins/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.js-select2').select2();
    });
</script>

@endpush

