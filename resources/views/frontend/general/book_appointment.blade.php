@extends('frontend.layouts.master')

@section('content')
    <!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-12">
						
							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
										<a href="doctor-profile.html" class="booking-doc-img">
											<img src="<?php if($doctor->image){ echo asset($doctor->image);}else{  echo asset('ui/frontend/img/doctors/doctor-thumb-02.jpg'); } ?>" alt="User Image">
										</a>
										
										<div class="booking-info">
											<h4><a href="doctor-profile.html">{{ $doctor->name }}</a></h4>
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">35</span>
											</div>
											<p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</p>
										</div>
									</div>
								</div>
							</div>

							<!-- Appointment Notice -->
							<div class="container text-center"> 
								<h3> Doctor {{ $doctor->name }} takes maximum {{ $doctor->max_appointment }} appointments daily</h3>
							</div>
							
							
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
														<input type="text" name="schedule_id" value="{{ $schedule->id }}" required hidden>
														<input type="text" name="doctor_id" value="{{ $doctor->id }}" required hidden>
														<input type="text" name="patient_id" value="{{ auth()->user()->patientProfile->id }}" required hidden>
														<input type="text" name="date" value="{{ $stdDate }}" required hidden>										
														{!! Form::submit('Book',['class'=>['btn','btn-primary','text-dark'] ]) !!}
													
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
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
@endsection