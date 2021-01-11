@extends('backend.layouts.master_tem')
@section('content')
<div class="container ">
    <h3>Upload a Excel file to import the department Information </h3>
    <div class="row"> 
        {!! Form::open(['route'=>'department.import.store','files'=>true]) !!}
        <div class="col"> 
            {!! Form::label('departmentExcelFile','Upload A Excel File') !!}
        </div>
        <div class="col"> 
            {!! Form::file('departmentExcelFile') !!}
        </div>
    </div>
    
    <div class="row"  style="margin-top:10px">
        <div class="col">
            {!! Form::submit('Import  Data',['class'=>'btn btn-primary']) !!}
        </div> 
    </div>
    {!! Form::close() !!}
</div>  
@endsection