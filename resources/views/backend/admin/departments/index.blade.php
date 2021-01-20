@extends('backend.layouts.master_tem')

@section('title', 'Department List')

@push('css')
<style>
    table,thead, th, td {
            border: 1px solid #696969  !important; 
            }
    table {
            border-collapse: collapse !important;
            }
    td {
        font-size: 15px;
        
    }
    
</style>
@endpush

@section('content')
    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of departments in this clinic</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span   class="m-0 font-weight-bold text-primary">
                <a href="{{ route('departments.create') }}" style="color:white;" title="Add New Department for this cilinc" class="btn btn-primary">
                    <i class="fas fa-plus-square"></i> Create
                </a>
            </span>
            <span class="text-right"><a class="btn btn-success" title="Restore the deleted Depatment Name" href="{{ route('departments.bin') }}">
                <i class="fas fa-trash-restore-alt"> </i> 
            </a></span>
            <span ><a class="btn btn-success"  title="Excel Upload" href="{{ route('department.excelimport.create') }}">
                <i class='fas fa-file-excel'></i> Upload
            </a></span>
            <span ><a class="btn btn-dark" title="Excel Download" href="{{ route('department.excel.export') }}">
                <i class='fas fa-file-excel'></i> Download
            </a></span>
        </div>   
        <div class="card-body">
            <div class="table-responsive" style="text-align: center">
                <table class="table" style="color:black" width="100%">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($departments as $department)
                        <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td>{{ $department->name }}</td>
                            <td>{{$department->status}}</td>
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
                    @empty
                        <tr><td colspan="3" class="text-danger">No Record Found. Add some records
                            </td></tr>
                    @endforelse

                    </tbody>
                </table>
                
            </div>
        </div>

    </div>

@endsection
