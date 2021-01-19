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
                                <h3 class="card-title">Edit the info of The Department</h3>
                                <p class="card-text"><small> Please write a meaningful and reuseable name and description of Department</small></p>
                            </div>
                            <div class="col-3" style="text-align: right">
                                <a class="btn btn-warning" style="color: black" href="{{route('departments.index')}}" title="List of Departments">
                                    <i class="fa fa-list-ol"></i> List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                {!! Form::model($department,[
                                    'route'=>['departments.update',$department->id],
                                    'method' => 'put'
                                    ]) !!}  
                                @include('backend.admin.departments.form')
    
                                
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection

