@extends('frontend.layouts.master')
@php
                        if(isset($doctor->image))
                        {
                            $photo = asset($doctor->image);
                        }
                        else 
                        {
                            if($doctor->gender === "male")
                            {
                                $photo = asset('ui/frontend/img/patients/patient_male.png');
                            }
                            else
                            {
                                $photo = asset('ui/frontend/img/patients/patient_female.png');
                            }
                        }
@endphp
@section('content')
    <!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
								<div class="card-body">
								<div class="filter-widget">
									<h4>Department</h4>
									<div>
										<label class="custom_check">
                                    {!! Form::open(['route'=>'doctorSearchResult']) !!}
                                            {!! Form::selectDepartment('department_id',$department_id??null,['placeholder'=>"Select Department",'class'=>'form-control','id'=>'department_id'] )!!}
                                            
										</label>
									</div>
								</div>
									<div class="btn-search">
                                        {!! Form::submit('Search',['class'=>['btn','btn-block',] ]) !!}
                                    </div>
                                    {!! Form::close() !!}	
								</div>
							</div>
							<!-- /Search Filter -->
							
						</div>
						@php
							$doctors = $doctors??null;
						@endphp
						
						<div class="col-md-12 col-lg-8 col-xl-9">
							@php
							$birthDate = \Carbon\Carbon::parse($doctor->birthDate);
						 @endphp
						<!-- Doctor Widget -->
									<div class="card">
										<div class="card-header">
											<div class="row">
												<div class="col-6">
													<h3> {{ $doctor->name }} Profile </h3>
												</div>
												<div class="col-6 text-right" >
													<a class="btn  bg-success-light" href="{{ route('createAppointment',[$doctor->id]) }}" title="List of All Doctors">
														<i class="far fa-calendar-check"></i> Make Appointment
													</a>
												</div>
				
											</div>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-8">
													<h4 class="doc-name">{{ $doctor->name }}</h4>
													<div class="clini-infos">
														<ul style="font-size: 20px">  
															<li><i class="fas fa-at"></i> Email : {{ $doctor->email ?? '---'}}</li>
															<li><i class="fas fa-phone"></i> Phone : {{ $doctor->phoneNo ?? '---'}}</li>
															<li><i class="fas fa-running"></i> Age : {{ $birthDate->age ?? '---'}} Years Old</li>
															<li><i class="fas fa-birthday-cake"></i> BirthDate : {{  $birthDate->format('d F, Y') ?? '---' }} </li>
															<li><i class="fas fa-venus-mars"></i> Gender : {{  $doctor->gender ?? '---'}} </li>
															<li><i class="fas fa-syringe"></i> Blood Group : {{  $doctor->bloodGroup ?? '---' }} </li>
															<li><i class="fas fa-map-marker-alt"></i> Address : {{  $doctor->address ?? '---' }} </li>
														</ul>
													</div>
												</div>
												<div class="col-4">
													<div class="doctor-img">
														<img src="{{ $photo }}" class="img-fluid" style="height: 250px !important ; width: 500px !important" alt="Patient Image"> <br>
														@if(!isset($doctor->image))
														
															<p class="text-danger" > You did not add a photo yet. Please Upload A photo </p>
														
														@endif
														
													</div>
												</div>
											</div>                            
										</div>
									</div>
									<!-- /Doctor Widget -->
									<!-- Doctor Details Tab -->
									<div class="card">
										<div class="card-body pt-0">
										
											<!-- Tab Menu -->
											<nav class="user-tabs mb-4">
												<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
													<li class="nav-item">
														<a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
													</li>
												</ul>
											</nav>
											<!-- /Tab Menu -->
											
											<!-- Tab Content -->
											<div class="tab-content pt-0">
											
												<!-- Overview Content -->
												<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
													<div class="row">
														<div class="col-md-12 col-lg-9">
														
															@if ( $doctor->bio)
																<!-- About Details -->
																<div class="widget about-widget">
																	<h4 class="widget-title">About Me</h4>
																	<p>{{ $doctor->bio }}</p>
																</div>
																<!-- /About Details -->   
															@endif
															
															<!-- Services List -->
															<div class="service-list">
																<h4>Professional Degrees</h4>
																<ul class="clearfix">
																	@php
																		$listOfDegree = explode(",",$doctor->degree)
																	@endphp
																	@foreach ($listOfDegree as $degree)
																		<li> {{ $degree }}</li>
																	@endforeach
																	
																</ul>
															</div>
															<!-- /Services List -->
															
															<!-- Specializations List -->
															<div class="service-list">
																<h4>Specializations</h4>
																<ul class="clearfix">
																	@php
																	$specialities = explode(",",$doctor->speciality)
																	@endphp
																	@foreach ($specialities as $speciality)
																		<li> {{ $speciality }}</li>
																	@endforeach
																</ul>
															</div>
															<!-- /Specializations List -->
				
														</div>
													</div>
												</div>
												<!-- /Overview Content -->
												
												
												<!-- Business Hours Content -->
												<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
													<div class="row">
														<div class="col-md-6 offset-md-3">
															@php
																$today = \Carbon\Carbon::now();
																$todaySchedule = \App\Models\DoctorSchedule::where('day','=',strtolower($today->format('l')))->where('doctor_id','=',$doctor->id)->first();
													
															@endphp
															<!-- Business Hours Widget -->
															<div class="widget business-widget">
																<div class="widget-content">
																	<div class="listing-hours">
																		@if ($todaySchedule)
																		<div class="listing-day current">
																			<div class="day">Today <span>{{ $today->format('d F, Y') }}</span></div>
																			<div class="time-items">
																				<span class="open-status"><span class="badge bg-success-light">Open Today</span></span>
																				<span class="time">{{ $todaySchedule->starting_time }} - {{ $todaySchedule->ending_time }}</span>
																			</div>
																		</div>
																		@else
																			<div class="day">Today <span>{{ $today->format('d F, Y') }}</span></div>
																			<div class="time-items">
																				<span class="open-status"><span class="badge bg-danger-light">Close Today</span></span>
																				<span class="time">{{ $todaySchedule->starting_time??'' }}  {{ $todaySchedule->ending_time??'' }}</span>
																			</div>
																		@endif
																		@foreach ($weekDays as $weekDay)
																			@php
																				$schedule = \App\Models\DoctorSchedule::where('day','=',strtolower($weekDay))->where('doctor_id','=',$doctor->id)->first();
																			@endphp
																			@if ($schedule)
																				<div class="listing-day">
																					<div class="day">{{ ucfirst($schedule->day) }}</div>
																					<div class="time-items">
																						<span class="time">{{ $schedule->starting_time }} - {{ $schedule->ending_time }}</span>
																					</div>
																				</div>
																			@else
																				<div class="listing-day closed">
																					<div class="day">{{ ucfirst($weekDay) }}</div>
																					<div class="time-items">
																						<span class="time"><span class="badge bg-danger-light">Closed</span></span>
																					</div>
																				</div>
																			@endif
																		@endforeach
																	</div>
																</div>
															</div>
															<!-- /Business Hours Widget -->
													
														</div>
													</div>
												</div>
												<!-- /Business Hours Content -->
												
											</div>
										</div>
									</div>
									<!-- /Doctor Details Tab -->
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
@endsection
