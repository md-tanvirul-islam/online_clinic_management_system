@extends('backend.layouts.master_tem')

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="{{ route('authorization.assignRole.index') }}"> UserRoleList</a>
            </div>
        </div>
        <div class="row" style="margin-bottom: 25px">
            <div class="col">
                <h2 style="text-align: center;">User and Roles</h2>
            </div>
        </div>
        @php
             
            $assignedroleIds  = Illuminate\Support\Facades\DB::table('model_has_roles')->where('model_id','=',$user->id)->pluck('role_id')->toArray();
            $remainingRoles = Illuminate\Support\Facades\DB::table('roles')->whereNotIn('id',$assignedroleIds)->pluck('name','id') ;

            // dd( $remainingRoles, $user->name);
        @endphp

        <div class="row">
            <div class="col text-center">
               <h3> User Info </h3>
            </div>
            <div class="col text-center">
                <h3>  Roles </h3>    
            </div>
            <div class="col">
                <h3>Add New Role</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <div class="row">
                    <div class="col"><b> Name </b></div>
                    <div class="col"> {{ $user->name }}</div>
                </div>
                <div class="row">
                    <div class="col"> <b>Email</b></div>
                    <div class="col"> {{ $user->email }}</div>
                </div>
                <div class="row">
                    <div class="col"> <b>Account Creation Date</b></div>
                    @php
                        
                    @endphp
                    <div class="col"> {{ $user->created_at }}</div>
                </div>
            </div>
            <div class="col">
                @php
                $roleAndModelIds  = Illuminate\Support\Facades\DB::table('model_has_roles')->where('model_id','=',$user->id)->get();
                @endphp
                <div class="table table-striped">
                    <div class="row">
                        <div class="col"><b>Name</b></div>
                        <div class="col"><b>Action</b></div>
                    </div>
                    @foreach ($roleAndModelIds as $roleAndModelId)
                        <div class="row" style="margin-top: 20px">
                            @php
                            $role = Illuminate\Support\Facades\DB::table('roles')->select('id','name')->where('id','=',$roleAndModelId->role_id)->first();
                            @endphp
                            <div class="col"> <b>{{ $role->name }}</b> </div> 
                            <div class="col""> 
                                <form action="{{ route('authorization.assignRole.remove', [$user->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="text" name="role_id" value="{{ $role->id }}" hidden>
                                    <button type="submit" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">
                                       Remove <i class="fas fa-trash"></i>
                                    </button>
                                </form>    
                            </div> 
                        </div>
                    @endforeach 
                </div>           
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        {!! Form::open(['route'=>['authorization.assignRole.add',$user->id],'method'=>'put']) !!}
                        {!! Form::select('role_id',$remainingRoles,null,['class'=>'form-control','placeholder'=>'Select One','required']) !!}
                    </div> 
                    <div class="col">
                    {!! Form::Submit('Add',['class'=>'btn btn-success']) !!}
                    {!! Form::Close() !!}
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection