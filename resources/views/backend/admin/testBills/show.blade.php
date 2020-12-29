@extends('backend.layouts.master_tem')

@section('content')
        <div class="container" style="margin-bottom: 20px">
            <div class="row">
                <div class="col" style="text-align: left">
                    <a class="btn btn-secondary" href="{{route('testBills.index')}}">TestBillList</a>
                </div>
            </div>
            @php
                use Illuminate\Support\Carbon; 
                 $datetime = new Carbon($testBill->date);
                 $date = $datetime->toDateString();
                 $patient_id = App\Models\PatientTest::where('bill_for_test_id','=',$testBill->id)->pluck('patient_id')->first();
            @endphp
            
           
            <h1 style="text-align:center;margin-bottom: 40px">Details of the Bill</h1>
                <div class="row">               
                    <div class="col" > 
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

                        <div class="row">
                            <div><h3> Bill Summary</h3> </div> 
                            <div class="table-responsive" style="text-align: center">
                                <table class="table table-bordered" width="50%" cellspacing="0">
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td>{{ $testBill->amount }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Paid</td>
                                        <td>{{ $testBill->paid }}</td>
                                    </tr>
                                    @php
                                        $due = ((float)$testBill->amount) - ((float)$testBill->paid);
                                    @endphp
                                    <tr>
                                        <td colspan="3" class="text-danger"><b>Due</b></td>
                                        <td>{{ $due }}</td>
                                    </tr>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                    @php 
                        $test_ids = App\Models\PatientTest::where('bill_for_test_id','=',$testBill->id)->pluck('test_id');
                    @endphp 

                    <div class="col"> 
                        @if ( $test_ids)   
                        <div><h3> List of Tests</h3> </div>                         
                            <div class="table-responsive" style="text-align: center">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
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
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td>{{ $testBill->amount }}</td>
                                    </tr>
                
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        @endif
                    </div>
                </div>
        </div>
@endsection
