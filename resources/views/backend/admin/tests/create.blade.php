@extends('backend.layouts.master_tem')

@section('content')

<!-- Default Browser Validation -->
<div class="container-fluid">
    <div class="card" style="color: black; margin-top:10px">
        <div class="card-header">
            <div class="row">
                <div class="col-9">
                    <h3 class="card-title">Add a Info of a Test</h3>
                    <p class="card-text"><small> Please select the test type, write the name and price of the Test  </small></p>
                </div>
                <div class="col-3" style="text-align: right">
                    <a class="btn btn-warning" style="color: black" title="List of the Tests" href="{{route('tests.index')}}"><i class="fa fa-list-ol"></i> List</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm">
                    {!! Form::open(['route' => 'tests.store']) !!}
                        
                    @include('backend.admin.tests.form')

                        <div class="form-row">
                            <div class="col-md-4 mb-3"> </div>
                            <div class="col-md-4 mb-3"> </div>
                            <div class="col-md-4 mb-3" style="text-align: right"> 
                                <button  style= "color:white" class="btn btn-info" > <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit </button>
                            </div>
                        </div>
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- /Default Browser Validation -->
</div>
@endsection

