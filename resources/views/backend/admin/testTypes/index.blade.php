@extends('backend.layouts.master_tem')

@section('title', "Test Type List")

@push('css')
<style>
    table,thead, th, td {
            border: 1px solid #696969  !important;
            padding: 2px !important; 
            }
    table {
            border-collapse: collapse !important;
            }
    td {
        font-size: 20px;    
    }
    input{
        color: #000000 !important;
        font-weight: bold !important;
        border-color: #000000  !important;
        border-style: solid !important;
        border-width: 1px !important;
    }
    input:focus {
        color: #000000c5 !important;
        font-weight: bold !important;
    }
    input::placeholder{
        color: #000000b2 !important;
        /* font-weight: bold !important; */
    }
</style>
@endpush

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of the Categories of offered test in the Clinic</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header" style="padding: 5px !important">
            <div class="row"> 
                <div class="col" style="padding-left: 0 !important">
                    <!-- table  Search  Bar-->
                    <form  method="POST" action="#" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="searchData" class="form-control small" placeholder="Search for Test Types..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col text-right">
                     <!-- table  Upper Section Buttons-->
                     <span   class="m-0 font-weight-bold text-primary">
                        <a href="{{ route('testTypes.create') }}" style="color:white;" title="Add New Test Types" class="btn btn-primary">
                            <i class="fas fa-plus-square"></i> Create
                        </a>
                    </span>
                </div>
            </div>
        </div>   
        <div class="card-body">
            <div class="table-responsive" style="text-align: center">
                <table class="table" style="color:black" width="100%">
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
                                {{-- <a href="{{ route('testTypes.show', [$testType->id]) }}" title="Details" style="color:black;" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a> --}}
                                <a href="{{ route('testTypes.edit', [$testType->id]) }}" title="Edit" style="color:black;" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('testTypes.destroy', [$testType->id]) }}" method="post" style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" title="Delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete ?')">
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


