@extends('backend.layouts.master_tem')

@section('title', "Doctors' Schedule List")

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of Doctors' Schedule of the Clinic</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span   class="m-0 font-weight-bold text-primary"><a href="{{ route('doctorSchedules.create') }}" style="color:white;" class="btn btn-primary">AddSchedule</a></span>
            <span class="text-right"><a class="btn btn-danger" href="{{ route('doctorSchedules.bin') }}">RecycleBin</a></span>
        </div>
        @if(count($doctorSchedules) == 0)
            <h3>No Record Found. Add some records</h3>
        @else
        <div class="card-body">
            <div class="table-responsive" style="text-align: center">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>name</th>
                        <th>Day</th>
                        <th>Begaining Time</th>
                        <th>Ending Time</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php
                    $i = 0
                    @endphp
                    @foreach($doctorSchedules as $doctorSchedule)
                    <tr>
                        <td> {{++$i}}</td>
                        @php
                        $doctor = App\Models\Doctor::find($doctorSchedule->doctor_id); 
                        // dd($doctor);   
                        @endphp
                        <td>{{ $doctor->name }}</td>
                        <td>{{$doctorSchedule->day}}</td>
                        <td>{{$doctorSchedule->starting_time}}</td>
                        <td>{{$doctorSchedule->ending_time}}</td>
                        <td >

                            {{-- <a href="{{ route('doctorSchedules.show', [$doctorSchedule->id]) }}" title="Details" style="color:black;" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a> --}}
                            <a href="{{ route('doctorSchedules.edit', [$doctorSchedule->id]) }}" title="Edit" style="color:black;" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('doctorSchedules.destroy', [$doctorSchedule->id]) }}" method="post" style="display: inline">
                                @csrf
                                @method('delete')
                                <button type="submit" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">
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
