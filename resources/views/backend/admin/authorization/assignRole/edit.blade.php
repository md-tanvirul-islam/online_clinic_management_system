@extends('backend.layouts.master_tem')

@push('css')
<style>
    table,thead{
            border: 2px solid #696969  !important; 
            }
    table {
            border-collapse: collapse !important;
            }
    td {
        font-size: 15px;
        font-weight: bold;
        color: black;
    }
    select, option{
        color: #000000 !important;
        font-weight: bold !important;
        border-color: #000000  !important;
        border-style: solid !important;
        border-width: 1px !important;
    }

</style>
@endpush

@section('content')
        @php
        $assignedroleIds  = Illuminate\Support\Facades\DB::table('model_has_roles')->where('model_id','=',$user->id)->pluck('role_id')->toArray();
        $remainingRoles = Illuminate\Support\Facades\DB::table('roles')->whereNotIn('id',$assignedroleIds)->pluck('name','id') ;
        $roleAndModelIds  = Illuminate\Support\Facades\DB::table('model_has_roles')->where('model_id','=',$user->id)->get();
        @endphp
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-9">
                        <h3 class="m-0 font-weight-bold text-primary">Make Chagnes of the Assigned Role if Necessary</h3>
                    </div>
                    <div class="col-3" style="text-align: right">
                        <a class="btn btn-warning" style="color: black" href="{{route('authorization.assignRole.index')}}" title="List of Users with Assigned Role">
                            <i class="fa fa-list-ol"></i> List
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-6">

                        <div class="card mb-4">
                            {{-- <div class="card-header">
                                Default Card Example
                            </div> --}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5>User Info</h5>
                                    </div>
                                </div>
                               <table class="table">
                                   <tr> 
                                       <td class="col">Name</td>
                                       <td class="col">{{ $user->name }}</td>
                                   </tr>
                                    <tr > 
                                       <td class="col">Email</td>
                                       <td class="col">{{ $user->email }}</td>
                                   </tr>
                                   <tr> 
                                        <td class="col">Account Creation Date</td>
                                        @php
                                            $date  = \Carbon\Carbon::parse($user->created_at);
                                        @endphp
                                        <td class="col">{{ $date->format('d F, Y') }}</td>
                                   </tr>
                                </table>
                                <div class="row">
                                    <div class="col">
                                        <h5>Add New Role</h5>
                                    </div>
                                </div>
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
                    <div class="col-6 col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h5>Assigned Role List </h5>
                                    </div>
                                </div>
                                <table class="table" style="color: black; text-align:center">
                                    <tr>
                                        <th>Role Name</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($roleAndModelIds as $roleAndModelId)
                                        <tr>
                                            @php
                                            $role = Illuminate\Support\Facades\DB::table('roles')->select('id','name')->where('id','=',$roleAndModelId->role_id)->first();
                                            @endphp
                                            <td> {{ $role->name }} </td> 
                                            <td> 
                                                <form action="{{ route('authorization.assignRole.remove', [$user->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="text" name="role_id" value="{{ $role->id }}" hidden>
                                                    <button type="submit" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">
                                                       Remove <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>    
                                            </td> 
                                        </tr>
                                    @endforeach 
                                    </table>   

                            </div>
                            {{-- <div class="card-body">
                                This card uses Bootstrap's default styling with no utility classes added. Global
                                styles are the only things modifying the look and feel of this default card example.
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection