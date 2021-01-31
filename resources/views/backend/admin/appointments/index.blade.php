@extends('backend.layouts.master_tem')

@section('title', "Doctors' Appointment List")

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
    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of Doctors' Appointment of the Clinic</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header" style="padding: 5px !important">
            <div class="row"> 
                <div class="col" style="padding-left: 0 !important">
                    <!-- table  Search  Bar-->
                    <form  method="POST" action="#" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="searchData" class="form-control small" placeholder="Search for Appointment..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col text-right">
                     <!-- table  Upper Section Buttons-->
                     <span   class="m-0 font-weight-bold text-primary"><a href="{{ route('appointments.create') }}" style="color:white;" class="btn btn-primary">
                        <i class="fas fa-plus-square"></i> Create
                    </a></span>
                     {{-- <span class="text-right"><a class="btn btn-sm btn-success" href="{{ route('appointments.bin') }}">
                    <i class="fas fa-trash-restore-alt"> </i> Restore     
                    </a></span> --}}

                </div>
            </div>
           
        </div>   
        <div class="card-body">
            <div class="table-responsive" style="text-align: center">
                <table class="table" style="color:black" width="100%">
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
                    @forelse($appointments as $appointment)
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{ $appointment->id }} </td>
                            @php
                            $schedule = App\Models\DoctorSchedule::find($appointment->doctor_schedule_id); 
                            $doctor = App\Models\Doctor::find($schedule->doctor_id); 

                            // $patient = App\Models\Patient::find($appointment->patient_id) 
                            @endphp
                            <td>{{ $doctor->user->name }}</td>
                            <td>{{$appointment->patientProfile->name}}</td>
                            <td>{{ $appointment->date }}</td>
                            <td>{{$schedule->day}}|{{$schedule->starting_time}} to {{$schedule->ending_time}} </td>
                            <td>{{$appointment->fee}}</td>
                            <td>
                                @if($appointment->is_paid =="yes")
                                    <i class="far fa-check-square" style="font-size:28px;color:lawngreen" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-times" style="font-size:28px;color:red" aria-hidden="true"></i>
                                @endif
                            </td>
                            <td >
                                @if($appointment->is_paid !== "yes")
                                    <form action="{{ route('appointments.pay') }}" method="post" style="display: inline">
                                        @csrf
                                        @method('put')
                                        <input type="text" name="id" value="{{ $appointment->id }}" hidden>
                                        <button type="submit" class="btn btn-sm btn-success" title="Make Payment" style="color:black" >
                                            <i class="fas fa-hand-holding-usd"></i>
                                        </button>
                                    </form>
                                @endif
                                <a href="{{ route('appointments.show', [$appointment->id]) }}" title="Details" style="color:black;" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('appointments.edit', [$appointment->id]) }}" title="Edit" style="color:black;" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('appointments.destroy', [$appointment->id]) }}" method="post" style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" title="Delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="9" class="text-danger">No Record Found. Add some records</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                {{-- {{ $doctorSchedules->links() }} --}}
            </div>
        </div>

    </div>

@endsection


