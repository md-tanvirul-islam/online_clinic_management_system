@extends('backend.layouts.master_tem')

@section('title', 'Department List')

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of delected departments</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if(count($departments) == 0)
            <div class="card-header py-3">
                <span class="text-right"><a class="btn btn-primary " href="{{ route('departments.index') }}">DepartmentList</a></span>
            </div>
            <h3>No Record Found. Add some records</h3>
        @else
        <div class="card-header py-3">
            <span class="text-right"><a class="btn btn-info" href="{{ route('departments.index') }}">DepartmentList</a></span>
            <span class="text-right"><a class="btn btn-success" href="{{ route('departments.restore') }}">ReStore</a></span>
        </div>


        <div class="card-body">
            <div class="table-responsive" style="text-align: center">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>name</th>
                        <th>Is Active</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php
                    $i = 0
                    @endphp
                    @foreach($departments as $department)
                    <tr>
                        <td> {{++$i}}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{$department->is_active}}</td>
                        <td >

                            <a href="{{ route('departments.show', [$department->id]) }}" style="color:black;" class="btn btn-info">
                                Details
                            </a>
                            <a href="{{ route('departments.edit', [$department->id]) }}" style="color:black;" class="btn btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('departments.permanently.delete', [$department->id]) }}" method="post" style="display: inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">PermanentDelete</button>
                            </form>

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
