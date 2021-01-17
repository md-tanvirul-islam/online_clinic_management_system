@extends('backend.layouts.master_tem')

@section('content')
<div class='container'> 
    <div class="row">
        <div class="col"><a href="{{ route('authorization.permission.list') }}" class="btn btn-primary"> PermissionList</a></div>
    </div>

    <div class="row" style="margin-top: 20px; margin-bottom:20px">
            <h3>Create Permissions for the users of this Application</h3>
    </div>
    <table class="table text-center">
            <tr>
                {!! Form::open(['route' => 'authorization.permission.store']) !!}
                <td class="text-dark"><b>{!! Form::label('name', 'Enter the Permission Name'); !!}</b></td>
                <td>{!! Form::text('name',null,['class' => 'form-control']) !!}</td>
                <td>{!! Form::submit('Submit',['class'=>'btn btn-info']) !!}</td>
            </tr>
            
    </table>
  
</div>
    
@endsection