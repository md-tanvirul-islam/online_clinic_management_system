{{-- @extends('frontend.layouts.master')

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
@endpush --}}



@extends('frontend.layouts.master')

@push('css')
<style>
    .intertable {
       border: 1px solid black;
       border-collapse: collapse;
      }
 </style>
@endpush

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
							@php
								$prescriptionDate = \Carbon\Carbon::parse($prescription->created_at);
							@endphp
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="row text-right" >
								<div class="col">
									<a href="#" title="Edit the Prescription" class="btn btn-sm bg-primary">
									 	<i class="fas fa-edit"></i> Edit
									</a>
									<a href="{{ route('doctor.own.patient.printPrescription',[$prescription->id]) }}" target="_blank" title="Print The Prescription" class="btn btn-sm bg-info">
										<i class="fas fa-print"></i> Print
									</a>
									<a href="{{ route('doctor.own.patient.pdfPrescription',[$prescription->id]) }}" target="_blank" title="Download PDF of this Prescription" class="btn btn-sm bg-success">
										<i class="fas fa-file-pdf"></i> PDF
									</a>
								</div>
							</div>							
							<table width="100%">
								<tr>
								  <td style="text-align:left" >
									<img src="{{ asset('ui/frontend/img/logo.png') }}" alt="Clinic Logo" style="height: 50px; weight:50px"> 
								  </td>
								  <td style="text-align:right">
									Date: {{ $prescriptionDate->toDateString() }}<br>
									Appointment No: AP{{ $prescription->appointment->id }} <br>
								  </td>
								</tr>
								<tr>
								  <td style="width: 50%;text-align:left">
									  <h3>Prescribed By</h3>
									  <b>{{ $doctor->name }}</b>,
									  Email: {{ $doctor->email }}<br>
									  {{ $doctor->degree }},
									  @if ($doctor->speciality)
									  {{ $doctor->speciality }} Specialist<br>
									  @endif
									  {{ $doctor->department->name }} Department <br>
								  </td>
								  <td style="width: 50%;  text-align:right">
								  <h3>Prescriped To</h3>
									  <b>{{ $patient->name }}</b>,
									  @php
										  $birthDate = \carbon\Carbon::parse($patient->birthDate);
									  @endphp
									  {{ $birthDate->age }} Years Old,
									  {{ $patient->gender }}<br>
									  Blood Group: {{ $patient->bloodGroup }}<br>
									  {{ $patient->phone }} ;
									  {{ $patient->email }}<br>
									  Address : {{ $patient->address }}<br>
								  </td>
								</tr>
								<tr>
									<td style="width: 50%" rowspan="2">
									   <h3> Medical History </h3>
									  <p>
										{!! $prescription->patient_medical_history !!}
									  </p>
						  
									</td>
									@php
										$noTests = count($prescription_tests);
										$noMedicines = count($prescription_medicines);
									@endphp
								   
									<td style="width: 50%" >
									  @if ($noTests)
										<h3>Test list </h3>
										<table class="intertable"  style="width:100%;margin-left: auto;margin-right: auto;text-align:center">
										  <tr>
											<th class="intertable" style="width:10% ">No.</th>
											<th class="intertable" style="width:90% ">Name</th>
										  </tr>
										  @forelse ($prescription_tests as $prescription_test)
										  @php
											  $test = App\Models\Test::find($prescription_test->test_id);
										  @endphp
											<tr>
											  <td class="intertable">{{ $loop->iteration	 }}</td>
											  <td class="intertable">{{ $test->name ?? '---'}}</td>
											</tr>  
										  @empty
										  <tr>
											<td class="intertable" colspan="2" style="text-align: center"> <p> No Test required for diagnose  </p></td>
										  </tr>
										  @endforelse
										</table>
									  @endif
									</td>
								</tr>
								<tr>
								  <td>
									@if ($noMedicines)
									<h3> Medicine list </h3>
									<table class="intertable" style="width:100%; margin-left: auto;margin-right: auto;text-align:center">
									   <tr>
										 <th class="intertable" style="width:10% ">No.</th>
										 <th class="intertable" style="width:30% ">Medicine Name</th>
										 <th class="intertable" style="width:15% ">Frequency</th>
										 <th class="intertable" style="width:45% ">Note</th>
									   </tr>
									   @forelse ($prescription_medicines as $prescription_medicine)
										 @php
											 $medicine = App\Models\MedicineGeneric::find($prescription_medicine->medicine_id);
										 @endphp
										 <tr>
										   <td class="intertable">{{ $loop->iteration	 }}</td>
										   <td class="intertable">{{ $medicine->name ?? '---'}}</td>
										   <td class="intertable">{{ $prescription_medicine->frequency ?? '---'}}</td>
										   <td class="intertable">{{ $prescription_medicine->note ?? '---'}}</td>
										 </tr>  
									   @empty
										   <tr>
											 <td class="intertable" colspan="4" style="text-align: center"> <p> No medicine has prescribed for you.  </p></td>
										   </tr>
									   @endforelse
									 </table> 
									@endif
								  </td>
								</tr>
							</table>

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