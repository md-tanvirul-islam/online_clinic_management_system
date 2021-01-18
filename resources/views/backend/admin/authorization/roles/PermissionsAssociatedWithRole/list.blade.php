@extends('backend.layouts.master_tem')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col" >
                <a class="btn btn-primary" href="{{ route('authorization.roles.list') }}">RoleList</a>
            </div>
        </div>
        <div class="row">
            <div class="col" style="text-align: center">
                <h1>List of Permission for {{$role->name}} role</h1>
            </div>
        </div>
        <div class="row">
            <div>
                {!! Form::open(['route'=>'authorization.assignPermission.role.store']) !!}
                {!! Form::text('role_id',$role->id,['class'=>'form-control','hidden']) !!}
                @foreach ($permissions as $permission)
                    <input type="checkbox" id="{{ $permission->id }}" name="{{ $permission->id }}" 
                        <?php 
                            if(in_array($permission->id,$permissionIdsForThisRole))
                            {
                                echo "checked";
                            }
                        ?>
                    >
                    <label for="{{ $permission->id }}"> {{ $permission->name }}</label><br>   
                @endforeach
                {!! Form::submit('Submit',['class'=>['btn btn-primary']]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection