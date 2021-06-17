@extends('backend.layouts.master_tem')
@push('css')
<style>
    input, select, option, textarea{
        color: #000000 !important;
        /* font-weight: bold !important; */
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

    <div class="card" style="color: black; margin-top:10px; ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h3 class="card-title">Create Bill for Different Types of Test</h3>
                            <p class="card-text"><small> Please input the tests info with help of dropdowns</small></p>
                        </div>
                        <div class="col-3" style="text-align: right">
                            <a class="btn btn-warning" style="color: black" href="{{route('testBills.index')}}" title="List of Departments">
                                <i class="fa fa-list-ol"></i> List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" style="margin-bottom: 15px">
                        <div class="col"> 
                            <label id="patient_id">Choose Patient</label>
                            {!! Form::selectPatient('patient_id',$request->session()->get('patient_id')??Null,['placeholder'=>"Select Patient",'class'=>'form-control','required'] )!!}
                        </div>
                        @php
                            $today = \Carbon\Carbon::now();
                        @endphp
                        <div class="col text-right"> 
                            <label id="date">Today</label>
                            <p><b>{{ $today->toFormattedDateString() }}</b> </p>
                            {!! Form::date('date',$request->session()->get('date')??$today,['class'=>'form-control','required','hidden']) !!} 
                        </div>
                    </div>
                    <h4> Test List </h4> <hr>
                    <div class="row clearfix">
                        <div class="col-md-12">
                          <table class="table table-bordered table-hover" id="tab_logic">
                            <thead>
                              <tr>
                                <th class="text-center" style="width: 5%"> # </th>
                                {{-- <th class="text-center"> Category </th> --}}
                                <th class="text-center" style="width: 35%"> Test Name </th>
                                <th class="text-center" style="width: 20%"> Price </th>
                                <th class="text-center" style="width: 20%"> Discount(%) </th>
                                <th class="text-center" style="width: 20%"> Total </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr id='addr0'>
                                <td>1</td>
                                {{-- <td><input type="text" name='product[]'  placeholder='Enter Product Name' class="form-control"/></td> --}}
                                {{-- <td>
                                    {!! Form::selectTestType('testType_id',Null,['placeholder'=>"Select Test Type",'class'=>'form-control','id'=>'testType_id',] )!!}
                                </td> --}}
                                {{-- <td><input type="number" name='qty[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td> --}}
                                <td>
                                    {{-- {!! Form::select('test_id',[],Null,['class'=>'form-control','id'=>'test_id',] )!!} --}}
                                    {!! Form::selectTest('test_id[]',Null,['placeholder'=>"Select Test",'class'=>['form-control','test_id'],] )!!}
                                </td>
                                <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
                                <td><input type="number" name='dicount[]' placeholder='Discount in %' class="form-control discount" step="0.00" min="0"/></td>
                                <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
                              </tr>
                              <tr id='addr1'></tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="row clearfix">
                        <div class="col-md-12 text-right">
                          <button id="add_row" class="btn btn-success">Add Row</button>
                          <button id='delete_row' class=" btn btn-danger">Delete Row</button>
                        </div>
                      </div>
                      <div class="row clearfix" style="margin-top:20px;">
                        <div class="col-md-4"> </div>
                        <div class="col-md-4"> </div>
                        <div class=" col-md-4 text-right">
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
@endsection

@push('js')
  <script> 
    
    $.ajaxSetup({
      headers:{
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('.test_id').change(function(){
      let testID = $(".test_id").val();  
      if(testID){
          $.ajax({
          type:"GET",
          dataType : 'json',
          data : {test_id:testID},
          url:"{{ route('tests.testById')}}",
          success:function(res){   
          if(res){
              console.log();
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

    // $('#testType_id').change(function(){
    //   var testType_ID = $("#testType_id").val();  
    //   if(testType_ID){
    //       $.ajax({
    //       type:"GET",
    //       dataType : 'json',
    //       data : {testType_id:testType_ID},
    //       url:"{{ route('tests.testListByTestType')}}",
    //       success:function(res){   
    //       if(res){
    //           $("#test_id").empty();
    //           $("#test_id").append('<option>Select Test</option>');
    //           $.each(res,function(key,value ){
    //           $("#test_id").append('<option value="'+value.id+'">'+value.name+'</option>');
    //           });
          
    //       }else{
    //           $("#test_id").empty();
    //       }}});
    //   }else{
    //       $("#test_id").empty();
    //   }   
    // });

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
        calc();
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
            // var qty = $(this).find('.qty').val();
            var discount = $(this).find('.discount').val();
            var price = $(this).find('.price').val() ? $(this).find('.price').val() : 0 ;
            $(this).find('.total').val(price - (price*(discount/100)));
            
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
