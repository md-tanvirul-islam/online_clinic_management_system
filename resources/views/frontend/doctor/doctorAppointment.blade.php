@extends('frontend.layouts.master')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
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
							@include('frontend.doctor.sidebar')
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="appointments">
							@foreach ($appointments as $appointment)
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
								<!-- Appointment List -->
								<div class="appointment-list">
									<div class="profile-info-widget">
										<a href="{{ route('doctor.own.patient.profile',[$patient->id]) }}" class="booking-doc-img">
											<img src="{{ $photo }}" alt="Patient Image">
										</a>
										<div class="profile-det-info">
											<h3><a href="{{ route('doctor.own.patient.profile',[$patient->id]) }}"></a>{{ $patient->name }}</h3>
											<div class="patient-details">
												<h5><i class="far fa-clock"></i>{{ $appointment_date->format('d F,Y') }} </h5>
												<h5><i class="fas fa-map-marker-alt"></i>{{ $patient_age }} Years Old</h5>
												<h5><i class="fas fa-envelope"></i> {{  $patient->email}}</h5>
												<h5 class="mb-0"><i class="fas fa-phone"></i>{{ $patient->phone }}</h5>
											</div>
										</div>
									</div>
									<div class="appointment-action">
										<a href="{{ route('doctor.own.patient.profile',[$patient->id]) }}" class="btn btn-sm bg-info-light">
											<i class="far fa-eye"></i> Profile
										</a>
									</div>
								</div>
								<!-- /Appointment List -->
							@endforeach	
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