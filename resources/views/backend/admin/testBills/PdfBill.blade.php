<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('ui\backend\css\bootstrap.min.css') }}" rel="stylesheet
        <title>Document</title>
    </head>
    <body>
        <div class="container" style="margin-top: 50px">
            <div  class="row">
                <div class="col">
                    <div style="font-size: 15px">
                        <h3>Good Life clinic</h3>
                        <b>LOCATION : </b>
                        <i>28, Doyagonj (Hut lane),Gandaria, Dhaka-1204.</i><br>
                        <b>Information (Test):</b><br>
                        Phone No.02-47118925,02-47118927,02-47118528 <br>
                        Contact Time:07 AM to 11 PM. <br>
                        Doctor Serial:Mobile No.01878115751,01878115752  <br>
                        HotLine:10615.<br>
                        Sample collection home service- 01841211162 <br>
                    </div>
                </div>

                @php
                    use Illuminate\Support\Carbon; 
                    $datetime = new Carbon($bill_for_test->date);
                    $date = $datetime->toDateString();

                    $patient_id = App\Models\PatientTest::where('bill_for_test_id','=',$bill_for_test->id)->pluck('patient_id')->first();
                    $patient = App\Models\Patient::find($patient_id);

                    $test_ids = App\Models\PatientTest::where('bill_for_test_id','=',$bill_for_test->id)->pluck('test_id');
                    
                @endphp

                <div class="col" style="text-align: right">
                    <div style="font-size: 15px">
                        <h3>{{  $patient->name }}</h3>
                        <b>Address : </b><br>
                        <i>{{ $patient->address }}</i><br>
                        Phone No. : {{ $patient->phone }} <br>
                        Age: {{ $patient->age }} Years <br>
                        Gender: {{ $patient->gender==="male"?"Male":"Female"}}<br>
                        
                    </div>
                    <div style="font-size: 20px; margin-top:10px;">
                        <b>Bill Number :</b> {{ $bill_for_test->id }}
                    </div>
                </div>
            </div>            
            <div class="row" style="margin-top: 30px"> 
                <div class="col-8"> 
                    <h1 style="text-align: center">List of All Tests </h1>
                    <div  class="table-responsive" style="text-align: center">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                <th>No.</th>
                                <th>Test Name</th>
                                <th>Price</th>
                            </tr>
                        @foreach($test_ids as $test_id)
                            @php
                                $test = App\Models\Test::find($test_id);
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $test->name }}</td>
                                <td><b>{{ $test->price }}</b></td>
                            </tr>
                        @endforeach
                            <tr>
                                
                                <td colspan="2"><b>Total</b></td>
                                <td><b>{{ $bill_for_test->amount }}</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
               <div class="col-4">  
                    <h1 style="text-align: center">Bill Summary </h1>
                    <div  class="table-responsive" style="text-align: center">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                <th>Subject</th>
                                <th>Amount</th>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><b>{{ $bill_for_test->amount }}</b></td>
                            </tr>
                            <tr>
                                <td>Paid</td>
                                <td><b>{{ $bill_for_test->paid }}</b></td>
                            </tr>
                            @php
                                $due = ((float)$bill_for_test->amount) - ((float)$bill_for_test->paid);
                            @endphp
                            <tr>
                                <td class="text-danger"><b>Due</b></td>
                                <td><b>{{ $due }}</b></td>
                            </tr>
                            
                        </table>
                    </div>
                </div> 
            </div>
        </div>
        <script>
            window.print();
        </script>
    </body>
</html>