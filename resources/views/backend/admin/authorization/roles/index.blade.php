@extends('backend.layouts.master_tem')

@section('content')
<div class='container'> 
    <div class="row">
        <div class="col"><a href="{{ route('authorization.roles.create') }}" class="btn btn-primary"> CreateRole</a></div>
    </div>
    @if(count($roles) == 0)
        <h3>No Record Found. Add some records</h3>
    @else
        <div class="row text-center" style="margin-top: 20px;margin-bottom:20px;">
            <h1>List of Roles for this Application</h1>
        </div>
        <table class="table table-bordered text-center">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Guard Name</th>
                <th>Action</th>
            </tr>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->guard_name }}</td>
                    <td>
                        <a href="{{ route('authorization.roles.edit', [$role->id]) }}" title="Edit" style="color:black;" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a href="{{ route('authorization.roles.permissions.list', [$role->id]) }}" title="Permission" style="color:black;" class="btn btn-success">
                            <i class="fas fa-lock-open"></i>
                        </a>

                        <form action="{{ route('authorization.roles.destroy', [$role->id]) }}" method="post" style="display: inline">
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