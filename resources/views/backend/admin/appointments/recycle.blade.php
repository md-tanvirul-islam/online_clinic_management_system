@extends('backend.layouts.master_tem')

@section('title', 'Doctor Schedule Deleted List')

@section('content') 
    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of Deleted Doctor Schedule </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if(count($doctorSchedules) == 0)
            <div class="card-header py-3">
                <span class="text-right"><a class="btn btn-primary" href="{{route('doctorSchedules.index')}}">DoctorScheduleList</a></span>
            </div>
            <h3 class="text-center">No Record Found</h3>
        @else
            <div class="card-header py-3">
                <span class="text-right"><a class="btn btn-info" href="{{route('doctorSchedules.index')}}">DoctorScheduleList</a></span>
                <span class="text-right"><a class="btn btn-success" href="{{route('doctorSchedules.restore')}}">ReStoreAll</a></span>
                {{-- <span class="text-right"><a class="btn btn-danger" href="{{route('doctors.permanently.delete.all')}}">PDeleteAll</a></span> --}}
            </div>
   
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
                                    <a href="{{ route('doctorSchedules.show', [$doctorSchedule->id]) }}" title="Details" style="color:black;" class="btn btn-info">
                                        <i class="fas fa-eye"></i>
                               
                                    </a>
                                    <a href="{{ route('doctorSchedules.edit', [$doctorSchedule->id]) }}" title="Edit" style="color:black;" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                       
                                    </a>
                                    <form action="{{ route('doctorSchedules.permanently.delete.by.id', [$doctorSchedule->id]) }}" method="post" style="display: inline">
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
