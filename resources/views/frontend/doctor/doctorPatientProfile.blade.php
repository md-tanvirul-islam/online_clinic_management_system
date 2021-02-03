@extends('frontend.layouts.master')

@section('content')
            <!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile</h2>
						</div>
					</div>
				</div>
			</div>
            <!-- /Breadcrumb -->
            <!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar dct-dashbd-lft">
                            @php
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
							<!-- Profile Widget -->
							<div class="card widget-profile pat-widget-profile">
								<div class="card-body">
									<div class="pro-widget-content">
										<div class="profile-info-widget">
											<a href="#" class="booking-doc-img">
												<img src="{{ $photo }}" alt="Patient Image">
											</a>
											<div class="profile-det-info">
												<h3>{{ $patient->name ?? '---'}}</h3>
												
												<div class="patient-details">
													<h5><b>Patient ID :</b> PT{{ $patient->id }}</h5>
													<h5><b>Email :</b> {{ $patient->email }}</h5>
													<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>{{ $patient->address ?? '---'}}</h5>
												</div>
											</div>
										</div>
                                    </div>
                                    
									<div class="patient-info">
										<ul>
											<li>Phone: <span>{{ $patient->phone ?? '---' }}</span></li>
											<li>Age: <span>{{ $patient_age ?? '---'}} Years, Male</span></li>
											<li>Blood Group: <span>{{ $patient->bloodGroup ?? '---' }}</span></li>
										</ul>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li >
												<a href="{{ route('doctor.own.index') }}">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="{{ route('doctor.own.appointment') }}">
													<i class="fas fa-calendar-check"></i>
													<span>Appointments</span>
												</a>
											</li>
											{{-- <li>
												<a href="#">
													<i class="fas fa-user-injured"></i>
													<span>My Patients</span>
												</a>
											</li> --}}
											<li>
												<a href="{{ route('doctor.own.schedule') }}">
													<i class="fas fa-hourglass-start"></i>
													<span>Schedule Timings</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
							
							<!-- /Profile Widget -->
						</div>

						<div class="col-md-7 col-lg-8 col-xl-9 dct-appoinment">
							<div class="card">
								<div class="card-body pt-0">
									<div class="user-tabs">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_prescriptions" data-toggle="tab"><span>Prescription</span></a>
											</li> 
										</ul>
									</div>
									<div class="tab-content">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0 text-center">
															<thead>
																<tr>
																	<th>Doctor</th>
																	<th>Appt Date</th>
																	<th>Amount</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
                                                                @forelse ($appointments as $appointment)
                                                                    @php
                                                                        $appointment_date = \Carbon\Carbon::parse($appointment->date);
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
                                                                                $photo = asset('ui/frontend/img/doctors/doctor_female.png');
                                                                            }
                                                                        }
                                                                    @endphp 
                                                                    <tr>
                                                                        <td style="text-align: left">
                                                                            <h2 class="table-avatar">
                                                                                <a href="{{ route('doctor.own.profile') }}" class="avatar avatar-sm mr-2">
                                                                                    <img class="avatar-img rounded-circle" src="{{ $photo }}" alt="Doctor Image">
                                                                                </a>
                                                                                <a href="{{ route('doctor.own.profile') }}">{{ $doctor->name??'---' }} <span>{{ $doctor->speciality??'---' }}</span></a>
                                                                            </h2>
                                                                        </td>
                                                                        <td>{{ $appointment_date->format('d F, Y') }}</td>
                                                                        <td>{{ $appointment->fee }}</td>
                                                                        <td ><span class="badge badge-pill bg-success-light ">{{ $appointment->patient_status ?? '---' }}</span></td>
                                                                    </tr>  
                                                                @empty
                                                                
                                                                @endforelse
																{{-- <tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
																		</h2>
																	</td>
																	<td>12 Nov 2019 <span class="d-block text-info">8.00 PM</span></td>
																	<td>12 Nov 2019</td>
																	<td>$250</td>
																	<td>14 Nov 2019</td>
																	<td><span class="badge badge-pill bg-success-light">Confirm</span></td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																				<i class="far fa-edit"></i> Edit
																			</a>
																		</div>
																	</td>
																</tr> --}}
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										<!-- Prescription Tab -->
										<div class="tab-pane fade" id="pat_prescriptions">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0 text-center">
															<thead>
																<tr>
																	<th>Date </th>
																	<th>ID</th>									
																	<th>Created by </th>
																	<th></th>
																</tr>     
															</thead>
															<tbody>
																@forelse ($prescriptions as $prescription)
																	@php
																		
																		$createdDate = \Carbon\Carbon::parse($prescription->created_at);

																		$doctor = $prescription->doctor;

																		if(isset($doctor->image))
																		{
																			$photo = asset($doctor->image);
																		}
																		else 
																		{
																			if($doctor->gender === "Male")
																			{
																				$photo = asset('ui/frontend/img/doctors/doctor_male.png');
																			}
																			else
																			{
																				$photo = asset('ui/frontend/img/doctors/doctor_female.png');
																			}
																		}
																	@endphp
																	<tr>
																		<td>{{ $createdDate->format('d F, Y') }}</td>
																		<td>Prescription {{ $prescription->id }}</td>
																		<td>
																			<h2 class="table-avatar">

																				<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																					<img class="avatar-img rounded-circle" src="{{ $photo }}" alt="User Image">
																				</a>
																				<a href="doctor-profile.html">Dr. {{ $doctor->name }} <span>{{ $doctor->speciality}}</span></a>
																			</h2>
																		</td>
																		<td class="text-right">
																			<div class="table-action">
																				<a target="_blank" href="{{ route('doctor.own.patient.printPrescription',[$prescription->id]) }}" class="btn btn-sm bg-primary-light">
																					<i class="fas fa-print"></i> Print
																				</a>
																				<a target="_blank" href="{{ route('doctor.own.patient.showPrescription',[$prescription->id]) }}" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																			</div>
																		</td>
																	</tr>
																@empty
																	<tr>
																		<td colspan="4"><p class="text-danger">You Donot have Any Prescription </p></td>
																	</tr>
																@endforelse
															</tbody>	
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Prescription Tab -->												
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