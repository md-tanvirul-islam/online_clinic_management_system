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
                {{-- <div class="col" style="text-align: right">
                    <a href=" #" class="btn btn-info text-white" type="button">ForNewPatient</a> 
                </div> --}}
            </div>
            
            <h3 style="text-align:center;margin-bottom: 40px">Make Bill for Test</h3>
            {!! Form::open(['route' => 'testBills.store','id'=>'form1' ]) !!}
                <div class="row">
                
                    <div class="col-4"> 
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
                        
                        <div class="row" style="margin-top: 20px">
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

                    <div class="col-8"> 
                        {{-- before new style --}}
                            {{-- <div class="table-responsive" style="text-align: center">
                                <table style="color: black" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                        @if ($request->session()->has('test_ids'))
                                            @php
                                                    $test_ids = $request->session()->get('test_ids'); 
                                            @endphp
                                            @forelse($test_ids as $test_id)
                                                @php
                                                    $test  = App\Models\Test::find($test_id);
                                                @endphp
                                                <tr>
                                                    <td> {{$loop->iteration}}</td>
                                                    <td>{{ $test->name }}</td>
                                                    <td>{{ $test->testType->name }}</td>
                                                    <td>{{ $test->price }}</td>
                                                    <td>
                                                        <a class="btn btn-warning" href="{{ route('testBills.remove.test',[$test->id]) }}" title="Remove" style="color:black;"><i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        @endif
                                    </tbody>
                                
                                </table>
                                
                            </div> --}}
                        {{-- before new style --}}
                            
                            
                        <div class="row clearfix">
                            <div class="col-md-12">
                              <table class="table table-bordered table-hover" id="tab_logic">
                                <thead>
                                  <tr>
                                    <th class="text-center"> # </th>
                                    <th class="text-center"> Category </th>
                                    <th class="text-center"> Test Name </th>
                                    <th class="text-center"> Price </th>
                                    <th class="text-center"> Total </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr id='addr0'>
                                    <td>1</td>
                                    <td>{!! Form::selectTestType('testType_id',Null,['placeholder'=>"Select Test Type",'class'=>'form-control','id'=>'testType_id',] )!!}</td>
                                    <td>{!! Form::select('test_id',[],Null,['class'=>'form-control','id'=>'test_id',] )!!}</td>
                                    <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
                                    <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
                                  </tr>
                                  <tr id='addr1'></tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="row clearfix">
                            <div class="col-md-12">
                              <button id="add_row" class="btn btn-default pull-left">Add Row</button>
                              <button id='delete_row' class="pull-right btn btn-default">Delete Row</button>
                            </div>
                          </div>
                          <div class="row clearfix" style="margin-top:20px">
                            <div class="pull-right col-md-4">
                              <table class="table table-bordered table-hover" id="tab_logic_total">
                                <tbody>
                                  <tr>
                                    <th class="text-center">Sub Total</th>
                                    <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                                  </tr>
                                  <tr>
                                    <th class="text-center">Tax</th>
                                    <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                                        <input type="number" class="form-control" id="tax" placeholder="0">
                                        <div class="input-group-addon">%</div>
                                      </div></td>
                                  </tr>
                                  <tr>
                                    <th class="text-center">Tax Amount</th>
                                    <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
                                  </tr>
                                  <tr>
                                    <th class="text-center">Grand Total</th>
                                    <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col" style="text-align: center">
                        <button  style= "color:white" class="btn btn-primary" onclick="finalSubmit()"> <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit </button>
                    </div> 
                </div>
            {!! Form::close() !!}
        </div>

        <div class="container">
            <div class="row clearfix">
              <div class="col-md-12">
                <table class="table table-bordered table-hover" id="tab_logic">
                  <thead>
                    <tr>
                      <th class="text-center"> # </th>
                      <th class="text-center"> Product </th>
                      <th class="text-center"> Qty </th>
                      <th class="text-center"> Price </th>
                      <th class="text-center"> Total </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id='addr0'>
                      <td>1</td>
                      <td><input type="text" name='product[]'  placeholder='Enter Product Name' class="form-control"/></td>
                      <td><input type="number" name='qty[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td>
                      <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
                      <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
                    </tr>
                    <tr id='addr1'></tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row clearfix">
              <div class="col-md-12">
                <button id="add_row" class="btn btn-default pull-left">Add Row</button>
                <button id='delete_row' class="pull-right btn btn-default">Delete Row</button>
              </div>
            </div>
            <div class="row clearfix" style="margin-top:20px">
              <div class="pull-right col-md-4">
                <table class="table table-bordered table-hover" id="tab_logic_total">
                  <tbody>
                    <tr>
                      <th class="text-center">Sub Total</th>
                      <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                    </tr>
                    <tr>
                      <th class="text-center">Tax</th>
                      <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                          <input type="number" class="form-control" id="tax" placeholder="0">
                          <div class="input-group-addon">%</div>
                        </div></td>
                    </tr>
                    <tr>
                      <th class="text-center">Tax Amount</th>
                      <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
                    </tr>
                    <tr>
                      <th class="text-center">Grand Total</th>
                      <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

@endsection

@push('js')
  <script> 
    
    $.ajaxSetup({
      headers:{
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    });

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
    });

    function finalSubmit()
    {
      var input = $("<input>")
              .attr("type", "hidden")
              .attr("name", "do_submit").val("yes");
      $('#form1').append(input);
    }

    $(document).ready(function(){
      let i=1;
      $("#add_row").click(function(){
          b=i-1;
          $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
          $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
          i++; 
      });

      $("#delete_row").click(function(){
        if(i>1){
          $("#addr"+(i-1)).html('');
          i--;
        }
      });

      $('#tab_logic tbody').on('keyup change',function(){
        calc();
      });

      $('#tax').on('keyup change',function(){
        calc_total();
      });

      function calc()
      {
        $('#tab_logic tbody tr').each(function(i, element) {
          var html = $(this).html();
          if(html!='')
          {
            var qty = $(this).find('.qty').val();
            var price = $(this).find('.price').val();
            $(this).find('.total').val(qty*price);
            
            calc_total();
          }
          });
      }

      function calc_total()
      {
        total=0;
        $('.total').each(function() {
              total += parseInt($(this).val());
          });
        $('#sub_total').val(total.toFixed(2));
        tax_sum=total/100*$('#tax').val();
        $('#tax_amount').val(tax_sum.toFixed(2));
        $('#total_amount').val((tax_sum+total).toFixed(2));
      }

    });
  </script>
@endpush






