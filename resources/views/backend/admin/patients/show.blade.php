@extends('backend.layouts.master_tem')
@section('title', 'Patient Profile')

@push('css')
    <!-- Favicons -->
		<link type="image/x-icon" href="{{ asset('ui/frontend/img/favicon.png') }}" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('ui/frontend/css/bootstrap.min.css') }}">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('ui/frontend/plugins/fontawesome/css/fontawesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('ui/frontend/plugins/fontawesome/css/all.min.css') }}">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('ui/frontend/css/style.css') }}">

		@stack('css')

		<!-- jQuery -->
		<script src="{{ asset('ui/frontend/js/jquery.min.js') }}"></script>
@endpush

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

@section('content')
    <div class="container">
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

@endsection

@push('js')
    <!-- Bootstrap Core JS -->
		<script src="{{ asset('ui/frontend/js/popper.min.js') }}"></script>
		<script src="{{ asset('ui/frontend/js/bootstrap.min.js') }}"></script>
		
		<!-- Slick JS -->
		<script src="{{ asset('ui/frontend/js/slick.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ asset('ui/frontend/js/script.js') }}"></script>
@endpush
