@extends('frontend.layouts.master')

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
							@if ($doctors)
								@foreach ($doctors as $doctor)
									@php
										if(isset($doctor->image))
										{
											$photo = asset($doctor->image);
										}
										else {
											if($doctor->gender === "Male")
											{
												$photo = asset('ui/frontend/img/doctors/doctor_male.png');
											}
											else
											{
												$photo = asset('ui/frontend/img/doctors/doctor_female.jpg');
											}
										}
									@endphp
									<!-- Doctor Widget -->
									<div class="card">
										<div class="card-body">
											<div class="doctor-widget">
												<div class="doc-info-left">
													<div class="doctor-img">
														<a href="{{ route('doctorProfile',[$doctor->id]) }}">
															<img src="{{ $photo }}" class="img-fluid" alt="Doctor Image">
														</a>
													</div>
													<div class="doc-info-cont">
														<h4 class="doc-name"><a href="{{ route('doctorProfile',[$doctor->id]) }}">{{ $doctor->name }}</a></h4>
														<p class="doc-speciality">{{ $doctor->degree }}</p>
														<h5 class="doc-department">{{ $doctor->speciality }}</h5>														
													</div>
												</div>
												<div class="doc-info-right">
													<div class="clinic-booking">
														<a class="view-pro-btn" href="{{ route('doctorProfile',[$doctor->id]) }}">View Profile</a>
														<a class="apt-btn" href="{{ route('createAppointment',[$doctor->id]) }}">Book Appointment</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								<!-- /Doctor Widget -->
								@endforeach
							@endif
							
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
@endsection