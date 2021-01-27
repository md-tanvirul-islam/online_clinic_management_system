@extends('frontend.layouts.master')

@push('js')
	{{-- https://www.tiny.cloud/get-tiny/ --}}
	<script src='https://cdn.tiny.cloud/1/zwvp6vlf87t1t3cznyfxvrk0qjs9c1rqfj9tixq2cavyzsp8/tinymce/5/tinymce.min.js' referrerpolicy="origin">
	</script>
	<script>
	  tinymce.init({
		selector: '.mytextarea'
	  });
	</script>
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
									<li class="breadcrumb-item active" aria-current="page">Prescription</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Prescription for Patient</h2>
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
									{!! Form::open(['route'=>['doctor.own.patient.storePrescription',$patient->id]]) !!}
										{!! Form::text('appointment_id',$appointment_id,['hidden']) !!}
										<h4 >Prescription for Patient</h4>
										<div class="row">
											<div class="col-12">
												<div class="card shadow" style="margin-top: 0px !important ; margin-bottom:0px !important" >
													<div class="card-header" >
														<h4 class="m-0  text-dark">Medical history</h4>
													</div>
													<div class="card-body" style="padding: 5px !important">
														<textarea class="mytextarea" name="medicalHistory">
															Hello, World!
														</textarea>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
												<div class="col-6" style="padding-right : 1px !important ; ">
													<div class="card shadow " style="margin-top: 0px !important ; margin-bottom:0px !important">
														<div class="card-header">
															<h4 class="m-0 text-dark">Prescribe Medicine</h4>
														</div>
														<div  class="card-body" style=" padding :5px !important;min-height:150px !important">
															<div class="row">
																<div class="col" id="parientDivOfbasicMedicineDiv" >
																	{{-- basic Medicine info Div --}}
																	<div class="row" id="basicMedicineDiv" style="border: 1px solid black;margin-left: 0px !important;margin-right: 0px !important; margin-bottom:5px">
																		<div class="col">
																			<div class="row" style="margin-bottom: 3px !important">
																				<div class="col" style="padding-right: 2px !important;padding-left: 2px !important;padding-top: 2px !important">
																					{!! Form::selectMedicineGeneric('medicine_generic_id[]',null,['class'=>['form-control',],'placeholder'=>'Select Medicine']) !!}
																				</div>
																				{{-- <div class="col" style="padding: 2px !important ;">
																					{!! Form::selectMedicine('medicine_id',null,['class'=>['form-control']]) !!}
																				</div> --}}
																			</div>
																			<div class="row">
																				<div class="col" style="padding-right: 2px !important;padding-left: 2px !important ; "> 
																					{!! Form::text('frequency[]',null,['class'=>['form-control'],'placeholder'=>'Drug Frequency']) !!}
																				</div>
																				<div class="col" style="padding: 2px !important;padding-left: 2px !important "> 
																					{!! Form::text('note[]',null,['class'=>['form-control'],'placeholder'=>'Short Note']) !!}
																				</div>
																			</div>
																		</div>
																	</div>

																</div>
															</div>
															<div class="row">
																<div class="col text-right"> 
																	<button id="addMoreMedicine" type="button" class="btn btn-sm bg-success-light" title="Add More Medicine"> 
																		<i class="fas fa-plus"></i> More
																	</button>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-6" style="padding-left : 1px !important;">
													<div class="card shadow " style="margin-top: 0px !important ; margin-bottom:0px !important">
														<div class="card-header">
															<h4 class="m-0  text-dark">Test for Diagnosis</h4>
														</div>
														<div  class="card-body" style=" padding :5px !important; min-height:150px !important">
															<div class="row">
																<div class="col" id="parientDivOfbasicTestDiv" >
																	{{-- basic Test info Div --}}
																	<div class="row" id="basicTestDiv" style="border: 1px solid black;margin-left: 0px !important;margin-right: 0px !important; margin-bottom:5px">
																		<div class="col">
																			<div class="row" style="margin-bottom: 3px !important">
																				<div class="col" style="padding-right: 2px !important;padding-left: 2px !important;padding-top: 2px !important">
																					{!! Form::selectTest('test_id[]',null,['class'=>['form-control',],'placeholder'=>'Select Test']) !!}
																				</div>
																				{{-- <div class="col" style="padding: 2px !important ;">
																					{!! Form::selectMedicine('medicine_id',null,['class'=>['form-control']]) !!}
																				</div> --}}
																			</div>
																		</div>
																	</div>

																</div>
															</div>
															<div class="row">
																<div class="col text-right"> 
																	<button id="addMoreTest" type="button" class="btn btn-sm bg-success-light" title="Add More Test"> 
																		<i class="fas fa-plus"></i> More
																	</button>
																</div>
															</div>
														</div>
													</div>
												</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="card shadow mb-4" style="margin-top: 0px !important">
													<div class="card-header text-center">
														{!! Form::submit('Submit',['class'=>['btn bg-primary-light']]) !!}
													</div>
												</div>
											</div>
										</div>
									{!! Form::close() !!}
								</div>
							</div>

						</div>
					</div>
					

				</div>

			</div>		
			<!-- /Page Content -->
@endsection

@push('js')
			<script>
				$(document).ready(function() {
   
				$("#addMoreMedicine").click(function(){
					$("#basicMedicineDiv").clone().appendTo("#parientDivOfbasicMedicineDiv");
				});

				$("#addMoreTest").click(function(){
					$("#basicTestDiv").clone().appendTo("#parientDivOfbasicTestDiv");
				});

				});
			</script>
    		<!-- Sticky Sidebar JS -->
            <script src="{{ asset('ui/frontend/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
            <script src="{{ asset('ui/frontend/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
            
            <!-- Circle Progress JS -->
            <script src="{{ asset('ui/frontend/js/circle-progress.min.js') }}"></script>
@endpush