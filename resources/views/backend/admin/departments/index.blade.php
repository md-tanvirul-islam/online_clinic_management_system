@extends('backend.layouts.master_tem')

@section('title', 'Department List')

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of departments in this clinic</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span   class="m-0 font-weight-bold text-primary"><a href="{{ route('departments.create') }}" style="color:white;" class="btn btn-primary">AddDepartment</a></span>
            <span class="text-right"><a class="btn btn-danger" href="{{ route('departments.bin') }}">RecycleBin</a></span>
            <span ><a class="btn btn-success"  href="{{ route('department.excelimport.create') }}">UploadExcelData</a></span>
            <span ><a class="btn btn-secondary"  href="{{ route('department.excel.export') }}">ExportExcelData</a></span>
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
                    
                    @foreach($departments as $department)
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{$department->is_active}}</td>
                        <td >

                            <a href="{{ route('departments.show', [$department->id]) }}" title="Details" style="color:black;" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('departments.edit', [$department->id]) }}" title="Edit" style="color:black;" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('departments.destroy', [$department->id]) }}" method="post" style="display: inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure want to delete ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
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
