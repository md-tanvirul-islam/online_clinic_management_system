<!DOCTYPE html>
<html>
	<head>
		<title>Prescription</title>
		<style>
			.intertable {
			border: 1px solid black;
			border-collapse: collapse;
			}
		</style>
	</head>
		@php
		$prescriptionDate = \Carbon\Carbon::parse($prescription->created_at);
		@endphp
	<body style="margin: 20px">
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
		<script>
			window.print();
		</script>
	</body>
</html>