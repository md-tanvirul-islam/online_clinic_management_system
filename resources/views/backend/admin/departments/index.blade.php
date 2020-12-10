@extends('backend.layouts.master_tem')

@section('title', 'Department List')

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of departments in this clinic</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6   class="m-0 font-weight-bold text-primary"><a href="{{ route('departments.create') }}" style="color:white;" class="btn btn-primary">Add Division</a></h6>
        </div>
        @if(count($departments) == 0)
            <h3>No Record Found. Add some records</h3>
        @else
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
                        <td>{{$department->active}}</td>
                        <td >

                            <a href="{{ route('departments.show', [$department->id]) }}" style="color:black;" class="btn btn-info">
                                Details
                            </a>
                            <a href="{{ route('departments.edit', [$department->id]) }}" style="color:black;" class="btn btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('departments.destroy', [$department->id]) }}" method="post" style="display: inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">Delete</button>
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
