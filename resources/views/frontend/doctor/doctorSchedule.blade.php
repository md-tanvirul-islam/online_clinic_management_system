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
														<a href="#" class="btn btn-warning">
															Edit
														</a>
													</div>
												</div>
											</div>
											
											<div class="profile-box">  
												<div class="row">
													<div class="col-md-12">
														<div class="card schedule-widget mb-0">
																		<div class="container text-center" style='margin-top:10;margin-bottom:10px;font-weight:bolder'>
																			<div class="table table-bordered ">
																				<div class="row " style="margin-top:10px; margin-bottom:10px">
																					<div class="col   btn btn-primary text-dark" style="font-weight: bold">  Date </div> 
																					<div class="col   btn btn-primary text-dark" style="font-weight: bold">Day </div> 
																					<div class="col   btn btn-primary text-dark" style="font-weight: bold">Starting Time </div> 
																					<div class="col   btn btn-primary text-dark" style="font-weight: bold">Ending Time </div>
																					<div class="col   btn btn-primary text-dark" style="font-weight: bold">Booked Number</div>
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
																								$schedule = App\Models\DoctorSchedule::where('doctor_id','=',"$doctor->id")->where('day','=',"$day")->first(); 
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
														
																					</div>
																				@endfor
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