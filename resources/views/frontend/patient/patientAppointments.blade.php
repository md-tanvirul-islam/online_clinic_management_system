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
									<li class="breadcrumb-item active" aria-current="page">Appointments</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Appointments</h2>
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
							<div class="card">
								<div class="card-body pt-0">
										
										<!-- Appointment Tab -->

											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0 text-center">
															<thead>
																<tr>
																	<th>Doctor</th>
																	<th>Appt Date</th>
																	<th>Booking Date</th>
																	<th>Amount</th>
																	<th>Purpose</th>
																	<th>Status</th>
																	{{-- <th></th> --}}
																</tr>
															</thead>
															<tbody>
																@forelse ($appointments as $appointment)
																@php
																	$doctor = App\Models\Doctor::find($appointment->doctor_id);
																	if(isset($doctor->image))
																		{
																			$photo = asset($doctor->image);
																		}
																		else 
																		{
																			if($doctor->gender === "male")
																			{
																				$photo = asset('ui/frontend/img/doctors/doctor_male.png');
																			}
																			else
																			{
																				$photo = asset('ui/frontend/img/doctors/doctor_female.png');
																			}
																		}
																	$appointmentDate = \Carbon\Carbon::parse($appointment->date);
																	$bookingDate = \Carbon\Carbon::parse($appointment->created_at);
																	$today = \Carbon\Carbon::now();
								
																@endphp
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="{{ $photo  }}" alt="User Image">
																			</a>
																			<a href="#">Dr. {{ $doctor->name }} <span>{{ $doctor->speciality}}</span></a>
																		</h2>
																	</td>
																	<td>{{ $appointmentDate->format('d F, Y') }}</td>
																	<td>{{ $bookingDate->format('d F, Y') }}</td>
																	<td>BDT{{ $appointment->fee }}</td>
																	<td>{{ $appointment->patient_status }}</td>
																	@if ($appointment->is_paid === 'yes')
																		<td><span class="badge badge-pill bg-success-light">Done</span></td>
																	@endif
																	@if ($appointmentDate > $today && $appointment->is_paid === null)
																		<td><span class="badge badge-pill bg-warning-light">Coming</span></td>
																	@endif
																	@if ($appointmentDate < $today && $appointment->is_paid === null)
																		<td><span class="badge badge-pill bg-danger-light">Missed</span></td>
																	@endif
																	{{-- <td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td> --}}
																</tr>
																@empty
																	<tr>
																		<td colspan="5"> <p class="text-danger">You Donot Make Any Appointment </p></td>
																	</tr>
																@endforelse
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										
										<!-- /Appointment Tab -->
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