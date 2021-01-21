@extends('backend.layouts.master_tem')

@section('title', 'User and Role List')
@push('css')
<style>
    table,thead, th, td {
            border: 1px solid #696969  !important;
            padding: 2px !important; 
            }
    table {
            border-collapse: collapse !important;
            }
    td {
        font-size: 20px;    
    }
    input{
        color: #000000 !important;
        font-weight: bold !important;
        border-color: #000000  !important;
        border-style: solid !important;
        border-width: 1px !important;
    }
    input:focus {
        color: #000000c5 !important;
        font-weight: bold !important;
    }
    input::placeholder{
        color: #000000b2 !important;
        /* font-weight: bold !important; */
    }
</style>
@endpush
@section('content')

    <div class='container'> 
        <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of User and Assigned Role</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header" style="padding: 5px !important">
                <div class="row" >
                    <div class="col" style="padding-left: 0 !important">
                        <!-- table  Search  Bar-->
                        <form  method="POST" action="#" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="searchData" class="form-control small" placeholder="Search for Role or User..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col text-right">
                         <!-- table  Upper Section Buttons-->
                        <span   class="m-0 font-weight-bold text-primary"></span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="text-align: center">
                    <table class="table" style="color:black" width="100%">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>name</th>
                            <th>Roles</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
    
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                    @php
                                        $roleIds  = Illuminate\Support\Facades\DB::table('model_has_roles')->where('model_id','=',$user->id)->pluck('role_id');
                                    @endphp
                                <td>
                                    @foreach ($roleIds as $roleId)
                                        @php
                                            $roleName = Illuminate\Support\Facades\DB::table('roles')->select('name')->where('id','=',$roleId)->first();
                                            echo($roleName->name)." ";
                                        @endphp
                                    @endforeach
                                </td>
                                <td >
                                    <a href="{{ route('authorization.assignRole.edit',[$user->id]) }}" title="Edit" style="color:black;" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-danger">No Record Found. Add some records
                                </td></tr>
                        @endforelse
    
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
