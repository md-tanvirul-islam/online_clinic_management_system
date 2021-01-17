@extends('backend.layouts.master_tem')

@section('title', 'User and Role List')

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of User with Role</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        @if(count($users) == 0)
            <h3>No Record Found. Add some records</h3>
        @else
        <div class="card-body">
            <div class="table-responsive" style="text-align: center">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>name</th>
                        <th>Roles</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php
                    $i = 0
                    @endphp
                    @foreach($users as $user)
                    <tr>
                        <td> {{++$i}}</td>
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
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>

@endsection
