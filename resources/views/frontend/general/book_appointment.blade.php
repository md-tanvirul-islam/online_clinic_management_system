@extends('frontend.layouts.master')
	@php
		$patient = auth()->user()->patientProfile;	
	@endphp
@section('content')
	    <!-- Breadcrumb -->
		<div class="breadcrumb-bar">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-md-12 col-12">
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('indexPage') }}">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">Dashboard</h2>
					</div>
				</div>
			</div>
		</div>
	<!-- /Breadcrumb -->
		
		<!-- Page Content -->
		<div class="content">
			<div class="container-fluid">
	
				<div class="row">
					<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
						<!-- Profile Sidebar -->
						@include('frontend.patient.sidebar')
						<!-- /Profile Sidebar -->
						
					</div>
					
					<div class="col-md-7 col-lg-8 col-xl-9">							
						<!-- Appointment Notice -->
						<div class="container text-center"> 
							<h3> Doctor {{ $doctor->name }} takes maximum {{ $doctor->max_appointment }} appointments daily</h3>
						</div>
						<!-- Schedule Widget -->
						<div class="card-body">
							<div class="row">
								<div class="col-sm">
										<div class="row text-right">
											{{-- <div class="col-4"></div>
											<div class="col-4"></div> --}}
											<div class="col-4">
												{!! Form::open(['route'=>'StoreAppointment','id'=>'myForm']) !!}
												<label> <b>Choose the Appointment Status </b></label>
												{!! Form::select('patient_status',['new'=>'Visit after 30 Days','old'=>'Visit in 30 Days','report'=>'Report'],null,['placeholder'=>"Select Appointment Status",'class'=>'form-control','id'=>'mysearchForm_patient_status','required']) !!}	
												<input type="text" id="submitFormScheduleId" name='schedule_id' value="" required hidden>
												<input type="text" id="patient_id" name='patient_id' value="{{ $patient->id }}" required hidden>
												<input type="text" name='doctor_id' value="{{ $doctor->id }}" required hidden>
												<input type="text" id="submitFormDate" name="date" value="" required hidden>										
												{!! Form::submit('Submit',['class'=>['btn','bg-warning'] ,'hidden' ]) !!}
												{!! Form::close() !!}
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-12" style="text-align: right" >
												<button style= "color:white" class="btn btn-success" hidden> <i class="fa fa-search" aria-hidden="true"></i> Search </button>
											</div>
										</div>
										<hr>
										<!-- Schedule Widget -->
											<table class="table table-bordered  text-center" style="padding: 5px !important">
													<tr style="margin-top:10px; margin-bottom:10px">
														<th>Date </th> 
														<th>Day </th> 
														<th>Starting Time </th> 
														<th>Ending Time </th>
														<th>Remains</th>
														<th></th>
														{{-- <th>Action</th>  --}}
													</tr> 
												@for ($i= 0 ; $i<=7 ; $i++)
													@php
														$today = \Carbon\Carbon::now();
														$date = \Carbon\Carbon::now()->addDays($i); // find the dates after today.
														$DateForDB = $date->format('Y-m-d');
													@endphp
													<tr>
														<td>{{ $date->format('d M,Y') }} <br><b><span class="text-success">{{ $today->format('d M,Y') === $date->format('d M,Y')?"Today":"" }}</span></b></td> 
														<td>{{ $date->format('l') }} </td> 
															@php
																$day = strtolower($date->format('l'));
																$schedule = App\Models\DoctorSchedule::where('doctor_id','=',$doctor->id)->where('day','=',"$day")->first(); 
																$doctor = App\Models\Doctor::find($doctor->id)->first(); 
																$sTime = $schedule->starting_time??null;
																$eTime =  $schedule->ending_time??null;
																$noOfBookings = App\Models\Appointment::where('date','=',"$DateForDB")->count();
																$remain_booking = $doctor->max_appointment - $noOfBookings;
															@endphp
														<td>
															<?php
																if ($sTime) 
																{
																	echo $sTime;
																}
																else 
																{
																	echo "<span style='color: brown'>No Schedule</span>";
																}
															?>
														</td> 
														<td>
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
														</td> 
														<td>
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
														</td>
														@php
															$bookButtonId = 'bookButton-'.$i;
															 $scheduleId = 'schedule-'.$i;  
															 $dateId = 'date-'.$i;  
														@endphp
														<td>
															@if ($sTime)
															<input type="text" id="{{ $scheduleId }}" value="{{ $schedule->id }}" hidden>
															<input type="date" id="{{ $dateId }}" value="{{ $DateForDB }}" hidden>
															<button type='button' id='{{ $bookButtonId }}' class='bookbuttons btn btn-success'>Book</button>
															@else
																<span style='color: brown'>NA</span>
															@endif
															
														</td>   
													</tr>
												@endfor
											</table>
											<div>
											</div>
									<!-- /Schedule Widget -->
								</div>
							</div>
						</div>
						<!-- /Schedule Widget -->
	
					</div>
				</div>
	
			</div>
	
		</div>		
		<!-- /Page Content -->
@endsection
@push('js')
<script>
 
 $(document).ready(function(){

        $('.bookbuttons').click(function() {
            // set the schedule id in the form that id is #myForm
            const buttonId = $(this).attr('id');
            const splitText = buttonId.split('-');
            const scheduleId =  'schedule-'+splitText[1];
            const scheduleInputValue = $('#'+scheduleId).val();
            $('#submitFormScheduleId').attr("value",scheduleInputValue); // set value in the submit form
            // set the date in the form that id is #myForm
            const dateId =  'date-'+splitText[1];
            const dateInputValue = $('#'+dateId).val();
            $('#submitFormDate').attr("value",dateInputValue); // set value in the submit form
            // console.log(dateInputValue , scheduleInputValue);
            $("#myForm").submit(); // Submit the form
            });
    });
</script>
@endpush