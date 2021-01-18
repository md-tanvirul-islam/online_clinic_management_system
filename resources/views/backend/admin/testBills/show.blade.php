@extends('backend.layouts.master_tem')

@section('content')
        <div class="container" style="margin-bottom: 20px ;">
            <div class="row">
                <div class="col" style="text-align: left">
                    <a class="btn btn-warning" style="color: black" href="{{route('testBills.index')}}" title="List of all Test Bills ">
                        <i class="fa fa-list-ol"></i> List
                    </a>
                </div>
                <div class="col" style="text-align: right" >
                    <div style="display:inline-block;">
                        <a href="{{ route('testBills.print',[$bill_for_test->id]) }}" title="Print" style="color:black;" class="btn btn-success">Print
                            <i class="fa fa-print"></i>
                        </a>
                    </div>
                    <div style="display:inline-block;">
                        <a href="{{ route('testBills.pdf',[$bill_for_test->id]) }}" title="PDF" style="color:black;" class="btn btn-info">PDF
                            <i class="fas fa-file-pdf"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
            @php
                use Illuminate\Support\Carbon; 
                 $datetime = new Carbon($bill_for_test->date);
                 $date = $datetime->toDateString();
                 $patient_id = App\Models\PatientTest::where('bill_for_test_id','=',$bill_for_test->id)->pluck('patient_id')->first();
            @endphp
            
           
            <h3 style="text-align:center;margin-bottom: 40px">Details of the Bill</h3>
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
                        <br> 
                        <div class="row">
                            <div><h3> Bill Summary</h3> </div> 
                            <div class="table-responsive" style="text-align: center">
                                <table style="color: black" class="table table-bordered" width="50%" cellspacing="0">
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td>{{ $bill_for_test->amount }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Paid</td>
                                        <td>{{ $bill_for_test->paid }}</td>
                                    </tr>
                                    @php
                                        $due = ((float)$bill_for_test->amount) - ((float)$bill_for_test->paid);
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
                        $test_ids = App\Models\PatientTest::where('bill_for_test_id','=',$bill_for_test->id)->pluck('test_id');
                    @endphp 

                    <div class="col"> 
                        @if ( $test_ids)   
                        <div><h3> List of Tests</h3> </div>                         
                            <div class="table-responsive" style="text-align: center">
                                <table class="table table-bordered" style="color:black" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($test_ids as $test_id)

                                            @php
                                                $test = App\Models\Test::find($test_id);
                                            @endphp
                                            <tr>
                                                <td> {{$loop->iteration}} </td>
                                                <td>{{ $test->name }}</td>
                                                <td>{{ $test->testType->name }}</td>
                                                <td>{{ $test->price }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3"><b>Total</b></td>
                                            <td>{{ $bill_for_test->amount }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        @endif
                    </div>
                </div>
        </div>
@endsection
