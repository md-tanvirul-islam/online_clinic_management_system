@extends('backend.layouts.master_tem')
@push('otherHeaderInfo')
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
@endpush

@push('css')
<style>
    input, select, option, textarea{
        color: #000000 !important;
        font-weight: bold !important;
        border-color: #000000  !important;
        border-style: solid !important;
        border-width: 1px !important;
    }
    textarea:focus, input:focus {
        color: #000000c5 !important;
        font-weight: bold !important;
    }
    input::placeholder, textarea::placeholder{
        color: #000000b2 !important;
        /* font-weight: bold !important; */
    }
    table{
            border: 1px solid #696969  !important;
            padding: 2px !important; 
            color: #000000 !important;
            text-align: center !important;
            }
    table {
            border-collapse: collapse !important;
            }
    td {
        font-size: 15px;  
    }
    #myForm{
        padding: 0 ;
        margin: 0;
    }

</style>
@endpush

@section('content')
        <div class="container">
            <div class="card" style="color: black; margin-top:10px; width: 100%;">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <h3 class="card-title">Make an Appointment</h3>
                                    <p class="card-text"><small>Please add proper information to make an appointment</small></p>
                                </div>
                                <div class="col-3" style="text-align: right">
                                    <a class="btn btn-warning" style="color: black" href="{{route('appointments.index')}}" title="List of all Doctors' Appointment">
                                        <i class="fa fa-list-ol"></i> List
                                    </a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                        <div class="row">
                                            <div class="col-4">
                                                <h3 >Doctor </h3>
                                                {!! Form::open(['route' => 'appointments.doctorScheduleSearch.newPatient','id'=>'mysearchForm','method'=>'get']) !!}
                                                <div class="form-row">
                                                    <div class="form-group col-12" >
                                                        <label for="address"><b>Choose Department:</b></label>
                                                        {!! Form::select('department_id',$departments,$selectedData?$selectedData['department_id']:null,['placeholder'=>"Select Depatment",'class'=>'form-control','id'=>'mysearchForm_department_id'] )!!}
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-12" >
                                                        <label for="address"><b>Choose a Doctor:</b></label>
                                                        {!! Form::select('doctor_id',$doctors,$selectedData?$selectedData['doctor_id']:null,['placeholder'=>"Select Doctor",'class'=>'form-control','id'=>'mysearchForm_doctor_id'] )!!}
                                                    </div>
                                                </div>                                   
                                                <div class="form-row">
                                                    <label for="address"><b>Patient Status:</b></label>
                                                    {!! Form::select('patient_status',['new'=>'Visit after 30 Days','old'=>'Visit in 30 Days','report'=>'Report'],$selectedData?$selectedData['patient_status']:null,['placeholder'=>"Select Appointment Status",'class'=>'form-control','id'=>'mysearchForm_patient_status','required']) !!}	
                                                </div>
                                            </div>
                                            {!! Form::close() !!}        
                                    
                                            <div class="col-8">
                                                <h3 > Enter Patient Info</h3>
                                                <div class="form-row">
                                                    <div class="col-6">
                                        {!! Form::open(['route'=>'appointments.newPatient.store','id'=>'myForm']) !!}
                                                        <label for="name"><b>Enter Patient Name:</b></label>
                                                        {!! Form::text('name',null,['class'=>'form-control','required','placeholder' => 'Patient Name']) !!}
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="email"><b>Enter Patient Name:</b></label>
                                                        {!! Form::text('email',null,['class'=>'form-control','required','placeholder' => 'Patient Personal Email']) !!}
                                                    </div>
                                                </div> <br>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="address"><b>Patient Address:</b></label>
                                                                {!! Form::textarea('address',null,['placeholder'=>"Patient Address",'class'=>'form-control','rows'=>'6','id'=>'','required']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="email"><b>Date of Birth:</b></label>
                                                                {!! Form::date('birthDate',null,['class'=>'form-control','required']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <b>Gender:</b> <br>
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" value="Male" name="gender">Male
                                                                    </label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" value="Female" name="gender">Female
                                                                    </label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" value="Other" name="gender">Other
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="phone"> <b>Phone Number:</b></label>
                                                                {!! Form::text('phone',null,['class'=>'form-control','required','placeholder' => "Phone Number"]) !!}
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12" style="text-align: right" >
                                                <button style= "color:white" class="btn btn-success" hidden> <i class="fa fa-search" aria-hidden="true"></i> Search </button>
                                            </div>
                                        </div>
                                    @if ($selectedData)
                                        
                                            {!! Form::select('patient_status',['new'=>'Visit after 30 Days','old'=>'Visit in 30 Days','report'=>'Report'],$selectedData?$selectedData['patient_status']:null,['required','hidden']) !!}
                                            <input type="text" id="submitFormScheduleId" name='schedule_id' value="" required hidden>
                                            <input type="text" name='doctor_id' value="{{ $selectedData['doctor_id'] ?? null }}" required hidden>
                                            <input type="text" id="submitFormDate" name="date" value="" required hidden>										
                                            {!! Form::submit('Submit',['class'=>['btn','bg-warning'] ,'hidden' ]) !!}
                                        {!! Form::close() !!}


                                        
                                        <hr>
                                        @php
                                            $doctor = \App\Models\Doctor::find($selectedData['doctor_id'])
                                        @endphp
                                        <div class="text-center">
                                            <h4>Doctor {{ $doctor->name }}, {{ $doctor->department->name }} Department Schedule</h4>
                                        </div>
                                        
                                        <!-- Schedule Widget -->
                                            <table class="table table-bordered " style="padding: 5px !important">
                                                    <tr style="margin-top:10px; margin-bottom:10px">
                                                        <th>Date </th> 
                                                        <th>Day </th> 
                                                        <th>Starting Time </th> 
                                                        <th>Ending Time </th>
                                                        <th>Remains</th>
                                                        <th></th>
                                                        {{-- <th>Action</th>  --}}
                                                    </tr> 
                                                @for ($i= 0 ; $i<=7 ; $i++)
                                                    @php
                                                        $today = \Carbon\Carbon::now();
                                                        $date = \Carbon\Carbon::now()->addDays($i); // find the dates after today.
                                                        $DateForDB = $date->format('Y-m-d');
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $date->format('d M,Y') }} <br><b><span class="text-success">{{ $today->format('d M,Y') === $date->format('d M,Y')?"Today":"" }}</span></b></td> 
                                                        <td>{{ $date->format('l') }} </td> 
                                                            @php
                                                                $day = strtolower($date->format('l'));
                                                                $schedule = App\Models\DoctorSchedule::where('doctor_id','=',$selectedData['doctor_id'])->where('day','=',"$day")->first(); 
                                                                $doctor = App\Models\Doctor::find($selectedData['doctor_id'])->first(); 
                                                                $sTime = $schedule->starting_time??null;
                                                                $eTime =  $schedule->ending_time??null;
                                                                $noOfBookings = App\Models\Appointment::where('date','=',"$DateForDB")->count();
                                                                $remain_booking = $doctor->max_appointment - $noOfBookings;
                                                            @endphp
                                                        <td>
                                                            <?php
                                                                if ($sTime) 
                                                                {
                                                                    echo $sTime;
                                                                }
                                                                else 
                                                                {
                                                                    echo "<span style='color: brown'>No Schedule</span>";
                                                                }
                                                            ?>
                                                        </td> 
                                                        <td>
                                                            <?php 
                                                                if ($sTime) 
                                                                {
                                                                    echo $eTime;
                                                                }
                                                                else 
                                                                {
                                                                    echo "<span style='color: brown'>No Schedule</span>";
                                                                }
                                                            ?>
                                                        </td> 
                                                        <td>
                                                            <?php
                                                                if ($sTime) 
                                                                {
                                                                    echo $remain_booking ;															
                                                                }
                                                                else 
                                                                {
                                                                    echo "<span style='color: brown'>NA</span>";
                                                                }
                                                            ?>
                                                        </td>
                                                        @php
                                                            $bookButtonId = 'bookButton-'.$i;
                                                             $scheduleId = 'schedule-'.$i;  
                                                             $dateId = 'date-'.$i;  
                                                        @endphp
                                                        <td>
                                                            @if ($sTime)
                                                            <input type="text" id="{{ $scheduleId }}" value="{{ $schedule->id }}" hidden>
                                                            <input type="date" id="{{ $dateId }}" value="{{ $DateForDB }}" hidden>
                                                            <button type='button' id='{{ $bookButtonId }}' class='bookbuttons btn btn-success'>Book</button>
                                                            @else
                                                                <span style='color: brown'>NA</span>
                                                            @endif
                                                            
                                                        </td>   
                                                    </tr>
                                                @endfor
                                            </table>
                                            <div>
                                            </div>
							        <!-- /Schedule Widget -->
                                    @else
                                        
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
            </div>
        </div>

@endsection

@push('js')
<script>
 
 $(document).ready(function(){

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('#mysearchForm_department_id').change(function(){
        var departmentID = $("#mysearchForm_department_id").val();  
        if(departmentID){
            $.ajax({
            type:"GET",
            dataType : 'json',
            data : {departmentId:departmentID},
            url:"{{ route('appointments.doctorInfo')}}",
            success:function(res){        
            if(res){
                $("#mysearchForm_doctor_id").empty();
                $("#mysearchForm_doctor_id").append('<option>Select Doctor</option>');
                $.each(res,function(key,value ){
                $("#mysearchForm_doctor_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            
            }else{
                $("#mysearchForm_doctor_id").empty();
            }}});
        }else{
            $("#mysearchForm_doctor_id").empty();
        }   
    })
        
        $('#mysearchForm_doctor_id').change(function(){
            const doctor_id = $('#mysearchForm_doctor_id').val();
            const patient_id = $('#mysearchForm_patient_id').val();
            const patient_status = $('#mysearchForm_patient_status').val();
            if(patient_id !== '' && patient_status !== '' && doctor_id !== ''){
                $("#mysearchForm").submit();  // Submit the form
            }
        })

        $('#mysearchForm_patient_status').change(function(){
            const doctor_id = $('#mysearchForm_doctor_id').val();
            const patient_id = $('#mysearchForm_patient_id').val();
            const patient_status = $('#mysearchForm_patient_status').val();
            if(patient_id !== '' && patient_status !== '' && doctor_id !== ''){
                $("#mysearchForm").submit();  // Submit the form
            }
        })

        $('.bookbuttons').click(function() {
            // set the schedule id in the form that id is #myForm
            const buttonId = $(this).attr('id');
            const splitText = buttonId.split('-');
            const scheduleId =  'schedule-'+splitText[1];
            const scheduleInputValue = $('#'+scheduleId).val();
            $('#submitFormScheduleId').attr("value",scheduleInputValue); // set value in the submit form
            // set the date in the form that id is #myForm
            const dateId =  'date-'+splitText[1];
            const dateInputValue = $('#'+dateId).val();
            $('#submitFormDate').attr("value",dateInputValue); // set value in the submit form
            // console.log(dateInputValue , scheduleInputValue);
            $("#myForm").submit(); // Submit the form
            });
    });
</script>
@endpush
