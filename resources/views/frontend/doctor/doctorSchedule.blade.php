@extends('frontend.layouts.master')

@section('content')
   <!-- Breadcrumb -->
   <div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-12 col-12">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Schedule Timings</li>
					</ol>
				</nav>
					<h2 class="breadcrumb-title">Schedule Timings</h2>
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
							@include('frontend.doctor.sidebar')
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-body">
											<div> 
												<div class="row"> 
													<div class="col"> 
														<h4 class="card-title">Schedule Timings</h4>
													</div>
													<div class="col text-right" style="padding-bottom: 10px !important">  
														{{-- <a href="#" class="btn btn-warning">
															Edit
														</a> --}}
													</div>
												</div>
											</div>
											
											<div class="profile-box">  
												<div class="row">
													<div class="col-md-12">
														<div class="card schedule-widget mb-0">
																		<div class="container text-center" style='margin-top:10;margin-bottom:10px;font-weight:bolder'>
																			<table class="table table-bordered " style="padding: 5px !important">
																				<tr style="margin-top:10px; margin-bottom:10px">
																					<th>Date </th> 
																					<th>Day </th> 
																					<th>Starting Time </th> 
																					<th>Ending Time </th>
																					<th>Remains</th>
																				</tr> 
																			@for ($i= 0 ; $i<=7 ; $i++)
																				@php
																					$today = \Carbon\Carbon::now();
																					$dayAfterToday = \Carbon\Carbon::now()->addDays($i);
																					$date = new DateTime($dayAfterToday);
																					$stdDate = $date->format('Y-m-d');
																				@endphp
																				<tr>
																					<td style="font-weight: normal;">{{ $date->format('d M,Y') }} <br><b><span class="text-success">{{ $today->format('d M,Y') === $date->format('d M,Y')?"Today":"" }}</span></b></td> 
																					<td style="font-weight: normal;">{{ $date->format('l') }} </td> 
																						@php
																							$day = strtolower($date->format('l'));
																								$schedule = App\Models\DoctorSchedule::where('doctor_id','=',"$doctor->id")->where('day','=',"$day")->first(); 
																								$sTime = $schedule->starting_time??null;
																								$eTime =  $schedule->ending_time??null;
																								$noOfBookings = App\Models\Appointment::where('date','=',"$stdDate")->count();
																								$remain_booking = $doctor->max_appointment - $noOfBookings;
																						@endphp
																					<td style="font-weight: normal;">
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
																					<td style="font-weight: normal;">
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
																					<td style="font-weight: normal;">
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
																				</tr>
																			@endfor
																		</table>
																		</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
@endsection

@push('js')
    		<!-- Sticky Sidebar JS -->
            <script src="{{ asset('ui/frontend/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
            <script src="{{ asset('ui/frontend/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
            
            <!-- Circle Progress JS -->
            <script src="{{ asset('ui/frontend/js/circle-progress.min.js') }}"></script>
@endpush