@extends('backend.layouts.master_tem')

@push('otherHeaderInfo')
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
@endpush
@push('css')
<style>
    table,thead, th, td {
            border: 2px solid #696969  !important; 
            }
    table {
            border-collapse: collapse !important;
            }
    td {
        font-size: 20px;
        font-weight: bold;
    }
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
</style>
@endpush

@section('content')
        <div class="container" style="margin-bottom: 20px">
            <div class="row">
                <div class="col" style="text-align: left">
                    <a class="btn btn-warning" style="color: black" href="{{route('testBills.index')}}" title="List of all Test Bills ">
                        <i class="fa fa-list-ol"></i> List
                    </a>
                </div>
            </div>
            @php
                use Illuminate\Support\Carbon; 
                 $datetime = new Carbon($testBill->date);
                 $date = $datetime->toDateString();
                 $patient_id = App\Models\PatientTest::where('bill_for_test_id','=',$testBill->id)->pluck('patient_id')->first();
            @endphp
            
           
            <h1 style="text-align:center;margin-bottom: 40px">Update Bill info for Test</h1>
            {!! Form::model($testBill,['route' => ['testBills.update.add.test',$testBill->id],'id'=>'form1','method' => 'put' ]) !!}

                <div class="row">
                
                    <div class="col"> 
                        <div class="row">
                            <div><h3> Patient Info</h3> </div> 
                        </div>
                        <div class="row">                           
                            <div class=" col-6" >
                                <b> Patient Name </b><br>
                                @php
                                    $patient = App\Models\Patient::find($patient_id);
                                @endphp
                                {{  $patient->name }}
                            </div>
                        </div>
                        <div class="row">                           
                            <div class=" col-6" >
                                <b> Bill Date </b><br>
                                {{ $date  }}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6" >
                                <h3 >Test </h3>
                                {!! Form::label('testType_id', 'Choose Test')!!}<br>
                                {!! Form::selectTestType('testType_id',Null,['placeholder'=>"Select Test Type",'class'=>'form-control','id'=>'testType_id',] )!!}
                            </div>                          
                        </div>
                        <div class="row" style="margin-top: 5px">                           
                            <div class=" col-6" >
                                {!! Form::select('test_id',[],Null,['class'=>'form-control','id'=>'test_id',] )!!}
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">                           
                            <div class=" col-6" >
                                <button type="submit" title="Add Test to the Bill" style="color: black" class="btn btn-info"> <i class="fa fa-plus" aria-hidden="true"> Add</i> </button>
                            </div>
                        </div>
                    </div>

                    <div class="col"> 
                        @if ( $patient_tests)
                            
                            <div class="table-responsive" style="text-align: center">
                                <table class="table table-bordered" style="color: black" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                
                                    <tbody>
                                    @foreach($patient_tests as $patient_test)
                                        @php
                                            $test_id = $patient_test->test_id;
                                            $test = App\Models\Test::find($test_id);
                                        @endphp
                                        <tr>
                                            <td> {{$loop->iteration}}</td>
                                            <td>{{ $test->name }}</td>
                                            <td>{{ $test->testType->name }}</td>
                                            <td>{{ $test->price }}</td>
                                            <td>
                                               {!! Form::open(['route' => ['testBills.update.remove.test',$testBill->id],'method' => 'put' ]) !!}
                                                    <input type="text" name="patient_test_id" value="{{ $patient_test->id }}" hidden>
                                                    <button class="btn btn-warning" title="Remove" style="color:black;"><i class="fas fa-trash"></i></button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        @endif
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    {{-- <div class="col" style="text-align: center">
                        {!! Form::submit('Update',['class'=>['btn','btn-primary'],'onclick'=>'finalSubmit()' ]) !!}
                    </div>  --}}
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

    function finalSubmit()
    {
        var input = $("<input>")
               .attr("type", "hidden")
               .attr("name", "do_submit").val("yes");
        $('#form1').append(input);
    }
 

    $('#testType_id').change(function(){
        var testType_ID = $("#testType_id").val();  
        if(testType_ID){
            $.ajax({
            type:"GET",
            dataType : 'json',
            data : {testType_id:testType_ID},
            url:"{{ route('tests.testListByTestType')}}",
            success:function(res){   
            if(res){
                $("#test_id").empty();
                $("#test_id").append('<option>Select Test</option>');
                $.each(res,function(key,value ){
                $("#test_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            
            }else{
                $("#test_id").empty();
            }}});
        }else{
            $("#test_id").empty();
        }   
    })

   
</script>
@endpush
