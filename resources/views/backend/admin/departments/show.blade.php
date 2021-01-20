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
    .centerPosition{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
@endpush
@section('content')
    <div class="container">
        <div class="card" style="color: black; margin-top:10px; margin-left:15%; width: 70%;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="card-title">The information of The {{ $department->name }} Department</h3>
                                {{-- <p class="card-text"><small> Please write a meaningful and reuseable name and description of Department</small></p> --}}
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
                                <div class="row" >
                                    <div class="card border-dark mb-3 col-12" >
                                        <div class="row no-gutters">
                                          <div class="col-md-4 text-center">
                                            <span class="centerPosition"> <b> Name </b></span> 
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body">
                                              <p class="card-text">
                                                {{ $department->name }}
                                              </p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="row" >
                                    <div class="card border-dark mb-3 col-12" >
                                        <div class="row no-gutters">
                                          <div class="col-md-4 text-center">
                                            <span class="centerPosition"> <b> Description </b></span> 
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body">
                                              <p class="card-text">
                                                {{ $department->description }}
                                              </p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="row">
                                    <div class="card border-dark mb-3 col-12" >
                                        <div class="row no-gutters">
                                          <div class="col-md-4 text-center">
                                            <span class="centerPosition"> <b> Is Active </b></span> 
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body">
                                              <p class="card-text">
                                                {{ $department->is_active }}
                                              </p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection

