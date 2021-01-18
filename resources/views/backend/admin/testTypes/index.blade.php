@extends('backend.layouts.master_tem')

@section('title', "Test Type List")

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of the categories of offered test in the Clinic</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span   class="m-0 font-weight-bold text-primary">
                <a href="{{ route('testTypes.create') }}" style="color:white;" title="Add New Test Types" class="btn btn-primary">
                    <i class="fas fa-plus-square"></i> Create
                </a>
            </span>
            {{-- <span class="text-right"><a class="btn btn-danger" href="{{ route('appointments.bin') }}">RecycleBin</a></span> --}}
        </div>   
        <div class="card-body">
            <div class="table-responsive" style="text-align: center">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($testType as $testType)
                        <tr>
                            <td> {{$loop->iteration}}</td>
                            <td>{{ $testType->name }}</td>
                            <td >
                                {{-- <a href="{{ route('testTypes.show', [$testType->id]) }}" title="Details" style="color:black;" class="btn btn-info">
                                    <i class="fas fa-eye"></i>
                                </a> --}}
                                <a href="{{ route('testTypes.edit', [$testType->id]) }}" title="Edit" style="color:black;" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('testTypes.destroy', [$testType->id]) }}" method="post" style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <p class="text-danger">No Record Found. Add some records</p>
                    @endforelse

                    </tbody>
                </table>
                
            </div>
        </div>

    </div>


@endsection


