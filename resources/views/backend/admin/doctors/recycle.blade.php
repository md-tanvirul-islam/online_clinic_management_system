@extends('backend.layouts.master_tem')

@section('title', 'Doctors List')

@section('content') 
    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of Delected Doctors </h1>
    {{-- @php
        dd($doctors);
    @endphp --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if(count($doctors) == 0)
            <div class="card-header py-3">
                <span class="text-right"><a class="btn btn-primary" href="{{route('doctors.index')}}">DoctorList</a></span>
            </div>
            <h3 class="text-center">No Record Found</h3>
        @else
            <div class="card-header py-3">
                <span class="text-right"><a class="btn btn-info" href="{{route('doctors.index')}}">DoctorList</a></span>
                <span class="text-right"><a class="btn btn-success" href="{{route('doctors.restore')}}">ReStoreAll</a></span>
                {{-- <span class="text-right"><a class="btn btn-danger" href="{{route('doctors.permanently.delete.all')}}">PDeleteAll</a></span> --}}
            </div>
   
            <div class="card-body">
            <div class="table-responsive" style="text-align: center">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>name</th>
                            <th>Phone</th>
                            <th>Speciality</th>
                            <th title="First time or come 1 month later after last visit">Fee(new)</th>
                            <th title="Visit in the same month">Fee(old)</th>
                            <th>Fee(Report)</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0
                            @endphp
                            @foreach($doctors as $doctor)
                            <tr>
                                <td> {{++$i}}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{$doctor->phoneNo}}</td>
                                <td>{{$doctor->speciality}}</td>
                                <td>{{$doctor->feeNew}}</td>
                                <td>{{$doctor->feeInMonth}}</td>
                                <td>{{$doctor->feeReport}}</td>
                                <td >
                                    <a href="{{ route('doctors.show', [$doctor->id]) }}" title="Details" style="color:black;" class="btn btn-info">
                                        <i class="fas fa-eye"></i>
                               
                                    </a>
                                    <a href="{{ route('doctors.edit', [$doctor->id]) }}" title="Edit" style="color:black;" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                       
                                    </a>
                                    <form action="{{ route('doctors.permanently.delete.by.id', [$doctor->id]) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" title="Permanetly Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">
                                            <i class="far fa-trash-alt" ></i>
                                            
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
