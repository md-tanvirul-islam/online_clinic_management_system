@extends('backend.layouts.master_tem')

@section('content')
<div class='container'> 
    <div class="row" style="margin-bottom: 20px">
        <div class="col"><a href="{{ route('authorization.permission.create') }}" class="btn btn-primary"> AddPermission</a></div>
    </div>
    @if(count($permissions) == 0)
        <h3>No Record Found. Add some records</h3>
    @else
        <div class="row text-center" style="margin-top: 20px;margin-bottom:20px;">
            <h1>List of Permissions for this Application</h1>
        </div>
        <table class="table table-bordered text-center">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Guard Name</th>
                <th>Action</th>
            </tr>
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td>
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
            @endforeach
        </table>
    @endif
</div>
    
@endsection