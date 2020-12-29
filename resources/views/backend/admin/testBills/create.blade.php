@extends('backend.layouts.master_tem')

@push('otherHeaderInfo')
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
@endpush

@section('content')
        <div class="container" style="margin-bottom: 20px">
            <div class="row">
                <div class="col" style="text-align: left">
                    <a class="btn btn-secondary" href="{{route('testBills.index')}}">TestBillList</a>
                </div>
                <div class="col" style="text-align: right">
                    <a href=" #" class="btn btn-info text-white" type="button">ForNewPatient</a> 
                </div>
            </div>
            
            <h1 style="text-align:center;margin-bottom: 40px">Make Bill for Test</h1>
            {!! Form::open(['route' => 'testBills.store','id'=>'form1' ]) !!}
                <div class="row">
                
                    <div class="col"> 
                        <div class="row">
                            <div class="col"><h3>Old Patient</h3></div>
                        </div>
                        <div class="row">                           
                            <div class=" col-6" >
                                {!! Form::selectPatient('patient_id',$request->session()->get('patient_id')??Null,['placeholder'=>"Select Patient",'class'=>'form-control','required'] )!!}
                            </div>
                        </div>
                        <div class="row">                           
                            <div class=" col-6" >
                                {!! Form::label('date', 'Date:')!!}
                                        {!! Form::date('date',$request->session()->get('date')??\Carbon\Carbon::now(),['class'=>'form-control','required']) !!}  
                            </div>
                        </div>
                        
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
                                {!! Form::submit('Add Test',['class'=>['btn','btn-info'] ]) !!}
                            </div>
                        </div>
                    </div>


                     {{-- @php 
                        $request->session()->forget('test_ids');
                    @endphp  --}}

                    <div class="col"> 
                        @if ($request->session()->has('test_ids'))
                            @php
                                $test_ids = $request->session()->get('test_ids'); 
                            @endphp
                            <div class="table-responsive" style="text-align: center">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    @php
                                        $i = 0
                                    @endphp

                                    @foreach($test_ids as $test_id)

                                        @php
                                            $test = App\Models\Test::find($test_id);
                                        @endphp
                                        <tr>
                                            <td> {{++$i}}</td>
                                            <td>{{ $test->name }}</td>
                                            <td>{{ $test->testType->name }}</td>
                                            <td>{{ $test->price }}</td>
                                            <td>
                                                <a class="btn btn-warning" href="{{ route('testBills.remove.test',[$test->id]) }}" title="Remove" style="color:black;"><i class="fas fa-trash"></i>
                                                </a>
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
                    <div class="col" style="text-align: center">
                        {!! Form::submit('Submit',['class'=>['btn','btn-primary'],'onclick'=>'finalSubmit()' ]) !!}
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
