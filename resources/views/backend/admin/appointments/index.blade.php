@extends('backend.layouts.master_tem')

@section('title', "Doctors' Appointment List")

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of Doctors' Appointment of the Clinic</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span   class="m-0 font-weight-bold text-primary"><a href="{{ route('appointments.create') }}" style="color:white;" class="btn btn-primary">MakeAppointment</a></span>
            <span class="text-right"><a class="btn btn-danger" href="{{ route('appointments.bin') }}">RecycleBin</a></span>
        </div>
        @if(count($appointments) == 0)
            <h3>No Record Found. Add some records</h3>
        @else
        <div class="card-body">
            <div class="table-responsive" style="text-align: center">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>AppointmentID</th>
                        <th>DoctorName</th>
                        <th>PatientName</th>
                        <th>Date</th>
                        <th>Day|Time</th>
                        <th>Fee</th>
                        <th>Is_Paid</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php
                    $i = 0
                    @endphp
                    @foreach($appointments as $appointment)
                    <tr>
                        <td> {{++$i}}</td>
                        <td>{{ $appointment->id }} </td>
                        @php
                        $schedule = App\Models\Doctor::find($appointment->doctor_schedule_id); 
                        $doctor = App\Models\doctorSchedule::find($schedule->doctor_id); 
                        $patient = App\Models\Doctor::find($appointment->patient_id)
                        // dd($doctor);   
                        @endphp
                        <td>{{ $doctor->name }}</td>
                        <td>{{$patient->name}}</td>
                        <td>{{$schedule->day|$schedule->starting_time|$schedule->ending_time }}</td>
                        <td>{{$appointment->fee}}</td>
                        <td>{{ $appointment->fee?"Yes":"No" }}</td>
                        <td >

                            <a href="{{ route('appointments.show', [$appointment->id]) }}" title="Details" style="color:black;" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('appointments.edit', [$appointment->id]) }}" title="Edit" style="color:black;" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('appointments.destroy', [$appointment->id]) }}" method="post" style="display: inline">
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
