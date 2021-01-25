@extends('frontend.layouts.master')

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
							@include('frontend.doctor.sidebar')
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Patient Appoinment</h4>
									<div class="appointment-tab">
									
										<!-- Appointment Tab -->
										<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
											<li class="nav-item" style="margin-right:5px;">
												<a class="nav-link active" href="{{ route('doctor.own.index') }}" >Upcoming</a>
											</li>
											<li class="nav-item">
												<a class="nav-link active" href="{{ route('doctor.own.appointment.today') }}" >Today</a>
											</li> 
										</ul>
										<!-- /Appointment Tab -->
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show active" id="upcoming-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Patient Name</th>
																		<th>Appt Date</th>
																		<th>Type</th>
																		<th>Fee</th>
																		<th class="text-center">Is Paid?</th>
																		
																	</tr>
																</thead>
																<tbody>
																	@forelse ($appointments as $appointment)
																		@php
																		$appointment_date = \Carbon\Carbon::parse($appointment->date);
																		$patient = App\Models\Patient::find($appointment->patient_id);
																		$patient_age = \Carbon\Carbon::parse($patient->birthDate)->age;
									
																		if(isset($patient->image))
																		{
																			$photo = asset($patient->image);
																		}
																		else {
																			if($patient->gender === "male")
																			{
																				$photo = asset('ui/frontend/img/patients/patient_male.png');
																			}
																			else
																			{
																				$photo = asset('ui/frontend/img/patients/patient_female.png');
																			}
																		}
																		@endphp
																		<tr>
																			<td>
																				<h2 class="table-avatar">
																					<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src=" {{ asset('ui/frontend/img/patients/patient.jpg') }}" alt="User Image"></a>
																					<a href="#">{{ $patient->name }} <span>#PT{{ $patient->id }}</span></a>
																				</h2>
																			</td>
																			<td>{{ $appointment_date->format('d F,Y') }}</span></td>
																			<td>{{ $appointment->patient_status }}</td>
																			<td class="text-center">BDT{{ $appointment->fee }}</td>
																			<td class="text-center">
																				@if($appointment->is_paid =="yes")
																					<i class="far fa-check-square" style="font-size:48px;color:lawngreen" aria-hidden="true"></i>
																				@else
																					<i class="fa fa-times" style="font-size:48px;color:red" aria-hidden="true"></i>
																				@endif
																			</td>
																			<td class="text-right">
																				<div class="table-action">
																					<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																						<i class="far fa-eye"></i> Profile
																					</a>
																				</div>
																			</td>
																		</tr>
																	@empty
																		<tr>
																			<td colspan="5">
																				<p class="text-danger  text-center"> You don't have any appointment </p>
																			</td>
																		</tr>																		</tr>
																	@endforelse
																	
																</tbody>
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
			<!-- /Page Content -->
@endsection

@push('js')
    		<!-- Sticky Sidebar JS -->
            <script src="{{ asset('ui/frontend/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
            <script src="{{ asset('ui/frontend/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
            
            <!-- Circle Progress JS -->
            <script src="{{ asset('ui/frontend/js/circle-progress.min.js') }}"></script>
@endpush