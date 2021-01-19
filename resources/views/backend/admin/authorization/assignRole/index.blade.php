@extends('backend.layouts.master_tem')

@section('title', 'User and Role List')
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

    <div class='container'> 
        <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of User and Assigned Role</h1>
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span   class="m-0 font-weight-bold text-primary"> </span>
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
                                    <a href="{{ route('authorization.assignRole.edit',[$user->id]) }}" title="Edit" style="color:black;" class="btn btn-warning">
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
