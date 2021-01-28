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
									<li class="breadcrumb-item active" aria-current="page">Prescriptions</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Prescriptions</h2>
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
										<!-- Prescription Tab -->

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
																		// dd($prescription);
																		$createdDate = \Carbon\Carbon::parse($prescription->created_at);

																		$doctor = $prescription->doctor;

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
																				<a target="_blank" href="{{ route('patient.own.prescription.print',[$prescription->id]) }}" class="btn btn-sm bg-primary-light">
																					<i class="fas fa-print"></i> Print
																				</a>
																				<a target="_blank" href="{{ route('patient.own.prescription.view',[$prescription->id]) }}" class="btn btn-sm bg-info-light">
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
										
										<!-- /Prescription Tab -->										
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