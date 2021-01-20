@extends('backend.layouts.master_tem')

@section('title', "Test Bill List")
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

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of the Test Bill in the Clinic</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span   class="m-0 font-weight-bold text-primary"><a href="{{ route('testBills.create') }}" style="color:white;" title="Make Bill For  Test" class="btn btn-primary"><i class="fas fa-plus-square"></i> Create</a></span>
            {{-- <span class="text-right"><a class="btn btn-danger" href="{{ route('testBills.bin') }}">RecycleBin</a></span> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive" style="text-align: center">
                <table class="table table-bordered" style="color: black" width="100%" cellspacing="0">
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
                    @forelse($testBills as $testBill)
                        <tr>
                            <td>{{$loop->iteration}} </td>
                            @php
                                $patient_id = $testBill->patientTest->first()->patient_id??null;
                                $patient = App\Models\Patient::find($patient_id)??null;
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
                    @empty
                        <p class="text-danger"><b>No Record Found. Add some records</b></p>
                    @endforelse

                    </tbody>
                </table>
                
            </div>
        </div>
    </div>


@endsection


