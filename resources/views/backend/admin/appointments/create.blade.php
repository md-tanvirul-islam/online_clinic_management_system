@extends('backend.layouts.master_tem')
@push('otherHeaderInfo')
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
@endpush

@section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('appointments.index')}}">List of Doctors' Appointment</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Make An Appointment</h1>
            {!! Form::open(['route' => 'appointments.store']) !!}
                <div class="row">
                
                    <div class="col"> 
                        <h3 >Doctor </h3>
                    
                        <div class="form-row">
                            <div class="form-group col-6 text-center" >
                                {!! Form::select('department_id',$departments,Null,['placeholder'=>"Select Depatment",'class'=>'form-control','id'=>'department_id'] )!!}
                            </div>
                            <div class="form-group col-6 text-center" >
                                {!! Form::select('doctor_id',['Abc' => 'select Doctor'],Null,['class'=>'form-control','id'=>'doctor_id'] )!!}
                            </div>
                        </div>
                        <div class="row"  style="height: 100px">
                            <div class="col">
                                <h4>Doctor Short Info </h4>
                                <span id="span_doctor_short_info"></span>
                            </div>
                        </div>
                        <div class="row" style="height: 200px">
                            <div class="col" >
                                <h4>Doctor Schedule</h4>
                                <span id="span_doctor_schedule"></span>
                                day, starting_time, ending_time
                            </div>
                        </div>
                    </div>
                    <div class="col"> 
                        <div class="row">
                            <div class="col"><h3>Old Patient</h3></div>
                            <div class="col" style="text-align: right">
                                <a href=" {{ route('appointments.newPatient.create') }}" class="btn btn-info text-white" type="button">NewPatient</a> 
                            </div>
                        </div>
                        <div class="row" style="margin-top: 3px" id="old_patient_div">
                            <div class="col" > 
                                <div class="row">
                                    <div class="col">
                                        {!! Form::select('patient_id',$patients,Null,['placeholder'=>"Select Patient",'class'=>'form-control','required'] )!!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        {!! Form::label('date', 'Appointment Date:')!!}
                                        {!! Form::date('date',null,['class'=>'form-control','required']) !!}  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        {!! Form::label('patient_status', 'Patient Status')!!}
                                        {!! Form::select('patient_status',['new'=>'Visit after 30 Days','old'=>'Visit in 30 Days','report'=>'Report'],Null,['placeholder'=>"Select Patient Status",'class'=>'form-control','required'] )!!} 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 3px" id="new_patient_div">
                            
                        </div>
                        
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col" style="text-align: center">
                        {!! Form::submit('Submit',['class'=>['btn','btn-primary'] ]) !!}
                    </div> 
                </div>
            {!! Form::close() !!}
        </div>

@endsection

@push('js')
<script>
    
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    })

    function doctorInfo()
    {
        var doctor_id = $("#doctor_id").val();
        var doctor_email = $("#doctor_email").val();
        // console.log(doctor_email);console.log(doctor_id);

        $.ajax({
            type : "POST",
            dataType : 'json',
            data : {id:doctor_id, email:doctor_email},
            url : "{{ route('appointments.doctorInfo') }}",
            success : function(data)
            {
                console.log(data);
            }
            })
    }
 

    $('#department_id').change(function(){
        var departmentID = $("#department_id").val();  
        if(departmentID){
            $.ajax({
            type:"GET",
            dataType : 'json',
            data : {departmentId:departmentID},
            url:"{{ route('appointments.doctorInfo')}}",
            success:function(res){        
            if(res){
                $("#doctor_id").empty();
                $("#doctor_id").append('<option>Select Doctor</option>');
                $.each(res,function(key,value ){
                $("#doctor_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            
            }else{
                $("#doctor_id").empty();
            }}});
        }else{
            $("#doctor_id").empty();
        }   
    })

    $('#doctor_id').change(
        function()
        {
            var doctorID = $('#doctor_id').val();
            if(doctorID)
            {
                $.ajax(
                    {
                      type: "GET",
                      dataType: 'json',
                      data : {doctorId : doctorID},
                      url : "{{ route('appointments.doctorInfo') }}",
                      success: function(data){
                          if(data)
                          {
                            console.log(data);
                            // $.each(data.schedule,function(key,value ){
                            // $("#span_doctor_schedule").html(' <tr><td>Photo</td><td>'+value.+'</td></tr> ');
                            // });
                            // console.log(data.doctor['id']);
                
                            // $("#span_doctor_schedule").empty();
                            // $("#span_doctor_short_info").html('<table> <tr><td>Photo</td><td>'+data.doctor.image+'</td></tr> <tr><td>Speciality</td>'+data.doctor.speciality+'<td></td></tr> <tr><td>Degree</td><td>'+data.doctor.degree+'</td></tr> <tr><td>Fee for New Patient</td><td>'+data.doctor.feeNew+'</td></tr>  <tr><td>Fee for old Patient</td><td>'+data.doctor.feeInMonth+'</td></tr> <tr><td>Fee for Report</td><td>'+data.doctor.feeReport+'</td></tr></table>');
                            // image , speciality, degree, feeNew,feeInMonth,feeReport
                          }
                          else{
                            $("#span_doctor_short_info").empty();
                            $("#span_doctor_schedule").empty();

                          }
                      }
                    }
                )
            }
        }
    );
    

           
    
</script>
@endpush
