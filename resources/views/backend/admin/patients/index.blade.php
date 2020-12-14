@extends('backend.layouts.master_tem')

@section('title', 'Patients List')

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of Patients of the Clinic</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span   class="m-0 font-weight-bold text-primary"><a href="{{ route('patients.create') }}" style="color:white;" class="btn btn-primary">Add patient</a></span>
            <span class="text-right"><a class="btn btn-danger" href="{{ route('patients.bin') }}">RecycleBin</a></span>
        </div>
        @if(count($patients) == 0)
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
                        <th>Gender</th>
                        <th>BirthDate</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php
                    $i = 0
                    @endphp
                    @foreach($patients as $patient)
                    <tr>
                        <td> {{++$i}}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{$patient->phone}}</td>
                        <td>{{$patient->gender}}</td>
                        <td>{{$patient->birthDate}}</td>
                        <td >

                            <a href="{{ route('patients.show', [$patient->id]) }}" style="color:black;" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('patients.edit', [$patient->id]) }}" style="color:black;" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('patients.destroy', [$patient->id]) }}" method="post" style="display: inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">
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
