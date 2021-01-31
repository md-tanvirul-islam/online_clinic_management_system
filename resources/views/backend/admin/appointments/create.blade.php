@extends('backend.layouts.master_tem')
@push('otherHeaderInfo')
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
@endpush

{{-- @section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('appointments.index')}}">List of Doctors' Appointment</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Make An Appointment</h1>
            {!! Form::open(['route' => 'appointments.store']) !!}
                <div class="row">
                
                    <div class="col"> 
                        <h3 >Doctor </h3>
                    
                        <div class="form-row">
                            <div class="form-group col-6 text-center" >
                                {!! Form::select('department_id',$departments,Null,['placeholder'=>"Select Depatment",'class'=>'form-control','id'=>'department_id'] )!!}
                            </div>
                            <div class="form-group col-6 text-center" >
                                {!! Form::select('doctor_id',['Abc' => 'select Doctor'],Null,['class'=>'form-control','id'=>'doctor_id'] )!!}
                            </div>
                        </div>
                        <div class="row"  style="height: 100px">
                            <div class="col">
                                <h4>Doctor Short Info </h4>
                                <span id="span_doctor_short_info"></span>
                            </div>
                        </div>
                        <div class="row" style="height: 200px">
                            <div class="col" >
                                <h4>Doctor Schedule</h4>
                                <span id="span_doctor_schedule"></span>
                                day, starting_time, ending_time
                            </div>
                        </div>
                    </div>
                    <div class="col"> 
                        <div class="row">
                            <div class="col"><h3>Old Patient</h3></div>
                            <div class="col" style="text-align: right">
                                <a href=" {{ route('appointments.newPatient.create') }}" class="btn btn-info text-white" type="button">NewPatient</a> 
                            </div>
                        </div>
                        <div class="row" style="margin-top: 3px" id="old_patient_div">
                            <div class="col" > 
                                <div class="row">
                                    <div class="col">
                                        {!! Form::select('patient_id',$patients,Null,['placeholder'=>"Select Patient",'class'=>'form-control','required'] )!!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        {!! Form::label('date', 'Appointment Date:')!!}
                                        {!! Form::date('date',null,['class'=>'form-control','required']) !!}  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        {!! Form::label('patient_status', 'Patient Status')!!}
                                        {!! Form::select('patient_status',['new'=>'Visit after 30 Days','old'=>'Visit in 30 Days','report'=>'Report'],Null,['placeholder'=>"Select Patient Status",'class'=>'form-control','required'] )!!} 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 3px" id="new_patient_div">
                            
                        </div>
                        
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col" style="text-align: center">
                        {!! Form::submit('Submit',['class'=>['btn','btn-primary'] ]) !!}
                    </div> 
                </div>
            {!! Form::close() !!}
        </div>

@endsection --}}

@push('css')
<style>
    input, select, option, textarea{
        color: #000000 !important;
        font-weight: bold !important;
        border-color: #000000  !important;
        border-style: solid !important;
        border-width: 1px !important;
    }
    textarea:focus, input:focus {
        color: #000000c5 !important;
        font-weight: bold !important;
    }
    input::placeholder, textarea::placeholder{
        color: #000000b2 !important;
        /* font-weight: bold !important; */
    }
</style>
@endpush

@section('content')
        <div class="container">
            <div class="card" style="color: black; margin-top:10px; width: 100%;">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <h3 class="card-title">Make an Appointment</h3>
                                    <p class="card-text"><small>Please add proper information to make an appointment</small></p>
                                </div>
                                <div class="col-3" style="text-align: right">
                                    <a class="btn btn-warning" style="color: black" href="{{route('appointments.index')}}" title="List of all Doctors' Appointment">
                                        <i class="fa fa-list-ol"></i> List
                                    </a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    
                                        <h3 >Doctor </h3>
                                        {!! Form::open(['route' => 'appointments.doctorScheduleSearch']) !!}
                                        <div class="form-row">
                                            <div class="form-group col-6 text-center" >
                                                {!! Form::select('department_id',$departments,$selectedData?$selectedData['department_id']:null,['placeholder'=>"Select Depatment",'class'=>'form-control','id'=>'department_id'] )!!}
                                            </div>
                                            <div class="form-group col-6 text-center" >
                                                {!! Form::select('doctor_id',$doctors,$selectedData?$selectedData['doctor_id']:null,['placeholder'=>"Select Doctor",'class'=>'form-control','id'=>'doctor_id'] )!!}
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12 text-right" >
                                                <button style= "color:white" class="btn btn-success" > <i class="fa fa-search" aria-hidden="true"></i> Search </button>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    @if ($selectedData)
                                        <!-- Schedule Widget -->
							<div class="card booking-schedule schedule-widget">
								<div class="container text-center" style='margin-top:10;margin-bottom:10px;font-weight:bolder'>
									<div class="table table-bordered ">
										<div class="row " style="margin-top:10px; margin-bottom:10px">
											<div class="col   btn btn-secondary">Date </div> 
											<div class="col   btn btn-secondary">Day </div> 
											<div class="col   btn btn-secondary">Starting Time </div> 
											<div class="col   btn btn-secondary">Ending Time </div>
											<div class="col   btn btn-secondary">Remains</div>
											<div class="col   btn btn-secondary">Type</div>
											<div class="col   btn btn-secondary">Click to Book </div> 
										</div> 
										@for ($i= 1 ; $i<=7 ; $i++)
											@php
												$dayAfterToday = \Carbon\Carbon::now()->addDays($i);
												$date = new DateTime($dayAfterToday);
												$stdDate = $date->format('Y-m-d');
											@endphp
											<div class="row" style="margin-top:10px; margin-bottom:10px">
												<div class="col ">{{ $date->format('d M,Y') }}</div> 
												<div class="col ">{{ $date->format('l') }} </div> 
													@php
                                                        $day = strtolower($date->format('l'));
                                                        $schedule = App\Models\DoctorSchedule::where('doctor_id','=',$selectedData['doctor_id'])->where('day','=',"$day")->first(); 
                                                        $doctor = App\Models\Doctor::find($selectedData['doctor_id'])->first(); 
                                                        $sTime = $schedule->starting_time??null;
														$eTime =  $schedule->ending_time??null;
														$noOfBookings = App\Models\Appointment::where('date','=',"$stdDate")->count();
														$remain_booking = $doctor->max_appointment - $noOfBookings;
                                                    @endphp
												<div class="col ">
													<?php
														if ($sTime) 
														{
															echo $eTime;
														}
														else 
														{
															echo "<span style='color: brown'>No Schedule</span>";
														}
													?>
												</div> 
												<div class="col ">
													<?php 
														if ($sTime) 
														{
															echo $eTime;
														}
														else 
														{
															echo "<span style='color: brown'>No Schedule</span>";
														}
													?>
												</div> 
												<div class="col">
													<?php
														if ($sTime) 
														{
															echo $remain_booking ;															
														}
														else 
														{
															echo "<span style='color: brown'>NA</span>";
														}
													?>
												</div>
												<div class="col" style="padding-bottom:5px">
													{!! Form::open(['route'=>'StoreAppointment']) !!}
													@if ($sTime)
														{!! Form::select('patient_status',['new'=>'Visit after 30 Days','old'=>'Visit in 30 Days','report'=>'Report'],Null,['placeholder'=>"Select",'class'=>'form-control','required']) !!}	
													@else
													{!! Form::select('patient_status',['new'=>'Visit after 30 Days','old'=>'Visit in 30 Days','report'=>'Report'],Null,['placeholder'=>"Select",'class'=>'form-control','disabled']) !!}	
													@endif
												</div>
												<div class="col ">
													@if ($sTime)
														<input type="text" name=@php "scheduleId_".$schedule->id @endphp value="{{ $schedule->id }}" required hidden>
														<input type="text" name=@php "doctorId_".$doctor->id @endphp value="{{ $doctor->id }}" required hidden>
														{{-- <input type="text" name="patient_id" value="{{ auth()->user()->patientProfile->id }}" required hidden> --}}
														<input type="text" name="date" value="{{ $stdDate }}" required hidden>										
														{!! Form::submit('Book',['class'=>['btn','bg-warning'] ]) !!}
													
													@else
														
													@endif
													{!! Form::close() !!}
												</div> 
											</div>
										@endfor
									</div>
								</div>
															
							</div>
							<!-- /Schedule Widget -->

                                        {{-- {!! Form::open(['appointments.store']) !!} --}}
                                            
                                            {{-- @foreach ($schedules as $schedule)
                                                {{ $schedule->day }} | 
                                                {{ $schedule->starting_time }} |
                                                {{ $schedule->ending_time }}<br>
                                            @endforeach --}}
                                            {{-- <div class="form-row">
                                                <div class="col-md-4 mb-3" style="text-align: left"> 
                                                    <button  style= "color:white" class="btn btn-info" > <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit </button>
                                                </div>
                                                <div class="col-md-4 mb-3"> </div>
                                                <div class="col-md-4 mb-3"> </div>
                                                
                                            </div> --}}
                                        {{-- {!! Form::close() !!} --}}
                                    @else
                                        
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
            </div>
        </div>

@endsection































@push('js')
<script>
    
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    })

    function doctorInfo()
    {
        var doctor_id = $("#doctor_id").val();
        var doctor_email = $("#doctor_email").val();
        // console.log(doctor_email);console.log(doctor_id);

        $.ajax({
            type : "POST",
            dataType : 'json',
            data : {id:doctor_id, email:doctor_email},
            url : "{{ route('appointments.doctorInfo') }}",
            success : function(data)
            {
                console.log(data);
            }
            })
    }
 

    $('#department_id').change(function(){
        var departmentID = $("#department_id").val();  
        if(departmentID){
            $.ajax({
            type:"GET",
            dataType : 'json',
            data : {departmentId:departmentID},
            url:"{{ route('appointments.doctorInfo')}}",
            success:function(res){        
            if(res){
                $("#doctor_id").empty();
                $("#doctor_id").append('<option>Select Doctor</option>');
                $.each(res,function(key,value ){
                $("#doctor_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            
            }else{
                $("#doctor_id").empty();
            }}});
        }else{
            $("#doctor_id").empty();
        }   
    })

    $('#doctor_id').change(
        function()
        {
            var doctorID = $('#doctor_id').val();
            if(doctorID)
            {
                $.ajax(
                    {
                      type: "GET",
                      dataType: 'json',
                      data : {doctorId : doctorID},
                      url : "{{ route('appointments.doctorInfo') }}",
                      success: function(data){
                          if(data)
                          {
                            console.log(data);
                            // $.each(data.schedule,function(key,value ){
                            // $("#span_doctor_schedule").html(' <tr><td>Photo</td><td>'+value.+'</td></tr> ');
                            // });
                            // console.log(data.doctor['id']);
                
                            // $("#span_doctor_schedule").empty();
                            // $("#span_doctor_short_info").html('<table> <tr><td>Photo</td><td>'+data.doctor.image+'</td></tr> <tr><td>Speciality</td>'+data.doctor.speciality+'<td></td></tr> <tr><td>Degree</td><td>'+data.doctor.degree+'</td></tr> <tr><td>Fee for New Patient</td><td>'+data.doctor.feeNew+'</td></tr>  <tr><td>Fee for old Patient</td><td>'+data.doctor.feeInMonth+'</td></tr> <tr><td>Fee for Report</td><td>'+data.doctor.feeReport+'</td></tr></table>');
                            // image , speciality, degree, feeNew,feeInMonth,feeReport
                          }
                          else{
                            $("#span_doctor_short_info").empty();
                            $("#span_doctor_schedule").empty();

                          }
                      }
                    }
                )
            }
        }
    );
    

           
    
</script>
@endpush
