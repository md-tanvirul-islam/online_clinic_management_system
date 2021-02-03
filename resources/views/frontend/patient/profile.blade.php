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
							@include('frontend.patient.sidebar')
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">							
							<div class="card">
								<div class="card-body pt-0">
									@php
									$birthDate = \Carbon\Carbon::parse($patient->birthDate);
								 @endphp
								<!-- Doctor Widget -->
											<div class="card">
												<div class="card-header">
													<div class="row">
														<div class="col-6">
															<h1> {{ $patient->name }} Profile </h1>
														</div>
														<div class="col-6 text-right" >
															<a class="btn  btn-info" style="color: black" href="{{route('patients.index')}}" title="List of All Patients">
																<i class="fa fa-list-ol"></i> List
															</a>
															<a href="{{ route('patients.edit', [$patient->id]) }}" title="Edit the profile" style="color:black;" class="btn btn-warning">
																<i class="fas fa-edit"></i> Edit
															</a>
														</div>
						
													</div>
												</div>
												<div class="card-body">
													<div class="row">
														<div class="col-6">
															<h2 class="doc-name">{{ $patient->name }}</h2>
															<div class="clini-infos">
																<ul style="font-size: 20px">  
																	<li><i class="fas fa-at"></i> Email : {{ $patient->email ?? '---'}}</li>
																	<li><i class="fas fa-phone"></i> Phone : {{ $patient->phone ?? '---'}}</li>
																	<li><i class="fas fa-running"></i> Age : {{ $birthDate->age ?? '---'}} Years Old</li>
																	<li><i class="fas fa-birthday-cake"></i> BirthDate : {{  $birthDate->format('d F, Y') ?? '---' }} </li>
																	<li><i class="fas fa-venus-mars"></i> Gender : {{  $patient->gender ?? '---'}} </li>
																	<li><i class="fas fa-syringe"></i> Blood Group : {{  $patient->bloodGroup ?? '---' }} </li>
																	<li><i class="fas fa-map-marker-alt"></i> Address : {{  $patient->address ?? '---' }} </li>
																</ul>
															</div>
														</div>
													@php
														if(isset($patient->image))
														{
															$photo = asset($patient->image);
														}
														else 
														{
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
														
														<div class="col-6">
															<div class="doctor-img">
																<img src="{{ $photo }}" class="img-fluid" style="height: 250px !important ; width: 500px !important" alt="Patient Image"> <br>
																@if(!isset($patient->image))
																
																	<p class="text-danger" > You did not add a photo yet. Please Upload A photo </p>
																
																@endif
																
															</div>
														</div>
													</div>                            
												</div>
											</div>
								<!-- /Doctor Widget -->
									
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