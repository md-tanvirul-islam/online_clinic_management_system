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