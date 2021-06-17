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
															<table class="table table-hover table-center mb-0 text-center">
																<thead>
																	<tr>
																		<th>Patient Name</th>
																		<th>Appt Date</th>
																		<th>Type</th>
																		<th>Fee</th>
																		<th class="text-center">Payment Status</th>
																		<th >Action</th>
																		
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
																			if($patient->gender === "Male")
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
																			<td style="text-align: left">
																				<h2 class="table-avatar">
																					<a href="{{ route('doctor.own.patient.profile',[$patient->id ]) }}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src=" {{ $photo }}" alt="User Image"></a>
																					<a href="{{ route('doctor.own.patient.profile',[$patient->id ]) }}">{{ $patient->name }} <span>#PT{{ $patient->id }}</span></a>
																				</h2>
																			</td>
																			<td>{{ $appointment_date->format('d F,Y') }}</span></td>
																			<td>{{ $appointment->patient_status }}</td>
																			<td class="text-center">BDT{{ $appointment->fee }}</td>
																			<td class="text-center">
																				@if($appointment->is_paid =="yes")
																					<i class="far fa-check-square" style="font-size:25px;color:lawngreen" aria-hidden="true"></i>
																				@else
																					<i class="fa fa-times" style="font-size:25px;color:red" aria-hidden="true"></i>
																				@endif
																			</td>
																			<td >
																				<div class="table-action text-left">
																					<a href="{{ route('doctor.own.patient.profile',[$patient->id]) }}" class="btn btn-sm bg-info-light">
																						<i class="far fa-eye"></i> Profile
																					</a>
																					@php
																						$appointment = App\Models\Appointment::find($appointment->id);
																					@endphp
																					@if ($appointment->prescription)
																						<a href="{{ route('doctor.own.patient.showPrescription',[$appointment->prescription->id]) }}" class="btn btn-sm bg-warning-light" title="Show Prescription For This Appointment">
																							<i class="fas fa-eye"></i></i> Show
																						</a>
																					@else
																						<a href="{{ route('doctor.own.patient.createPrescription',[$appointment->id,$patient->id]) }}" class="btn btn-sm bg-success-light" title="Make Prescription For This Patient">
																							<i class="fas fa-notes-medical"></i> Make
																						</a>
																					@endif
																					
																					@if($appointment->is_paid !== "yes")
																						<form action="{{ route('doctor.own.pay') }}" method="post" style="display: inline">
																							@csrf
																							@method('put')
																							<input type="text" name="appointment_id" value="{{ $appointment->id }}" hidden>
																							<button type="submit" class="btn btn-sm bg-primary-light" title="Pay Bill For This Appointment" style="color:black" >
																								<i class="fas fa-hand-holding-usd"></i> Pay
																							</button>
																						</form>
																					@endif
																				</div>
																			</td>
																		</tr>
																	@empty
																		<tr>
																			<td colspan="5">
																				<p class="text-danger  text-center"> You don't have any appointment </p>
																			</td>
																		</tr>																		
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