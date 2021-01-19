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
<div class='container'> 
    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of Permissions for The Users</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span   class="m-0 font-weight-bold text-primary">
                <a href="{{route('authorization.permission.create') }}" style="color:white;" title="Add New Permission for Users" class="btn btn-primary">
                    <i class="fas fa-plus-square"></i> Create
                </a>
            </span>
        </div>   
        <div class="card-body">
            <div class="table-responsive" style="text-align: center">
                <table class="table" style="color:black" width="100%">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($permissions as $permission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                            <td >
                                <a href="{{ route('authorization.permission.edit', [$permission->id]) }}" title="Edit" style="color:black;" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
        
                                <form action="{{ route('authorization.permission.destroy', [$permission->id]) }}" method="post" style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

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