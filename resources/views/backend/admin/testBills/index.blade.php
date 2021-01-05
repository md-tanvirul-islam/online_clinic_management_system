@extends('backend.layouts.master_tem')

@section('title', "Test Bill List")

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of the Test Bill in the Clinic</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span   class="m-0 font-weight-bold text-primary"><a href="{{ route('testBills.create') }}" style="color:white;" class="btn btn-primary">MakeTestBill</a></span>
            {{-- <span class="text-right"><a class="btn btn-danger" href="{{ route('testBills.bin') }}">RecycleBin</a></span> --}}
        </div>
        @if(count($testBills) == 0)
            <h3>No Record Found. Add some records</h3>
        @else
        <div class="card-body">
            <div class="table-responsive" style="text-align: center">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Patient</th>
                        <th>Date</th>
                        <th>TOtalBill</th>
                        <th>Paid</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php
                    $i = 0
                    @endphp
                    @foreach($testBills as $testBill)
                    <tr>
                        <td> {{++$i}}</td>
                        @php
                            //  dd($testBill->patientTest->first()->patient_id);
                            $patient_id = $testBill->patientTest->first()->patient_id??null;
                            $patient = App\Models\Patient::find($patient_id)??null;
                            // dd($patient->name);
                        @endphp
                        <td>{{ $patient->name??null  }}</td>
                        <td>{{ date("d F,Y", strtotime($testBill->date))??null}}</td>
                        <td>{{ $testBill->amount??null }}</td>
                        <td>{{ $testBill->paid??null}}</td>
                        <td >
                            <a href="{{ route('testBills.show', [$testBill->id]) }}" title="Details" style="color:black;" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('testBills.edit', [$testBill->id]) }}" title="Edit" style="color:black;" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('testBills.print',[$testBill->id]) }}" title="Print" style="color:black;" class="btn btn-success">
                                <i class="fa fa-print"></i>
                              </a>

                            <form action="{{ route('testBills.destroy', [$testBill->id]) }}" method="post" style="display: inline">
                                @csrf
                                @method('delete')
                                <button type="submit" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                
            </div>
        </div>
        @endif

    </div>


@endsection


