@extends('backend.layouts.master_tem')

@section('title', 'Doctors List')

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of doctors in this clinic</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6   class="m-0 font-weight-bold text-primary"><a href="{{ route('doctors.create') }}" style="color:white;" class="btn btn-primary">Add Doctor</a></h6>
        </div>
        @if(count($doctors) == 0)
            <h3>No Record Found. Add some records</h3>
        @else
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

                            <a href="{{ route('doctors.show', [$doctor->id]) }}" style="color:black;" class="btn btn-info">
                                Details
                            </a>
                            <a href="{{ route('doctors.edit', [$doctor->id]) }}" style="color:black;" class="btn btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('doctors.destroy', [$doctor->id]) }}" method="post" style="display: inline">
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
