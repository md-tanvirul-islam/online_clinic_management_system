

 <i class="fas fa-plus-square"></i> Create
 <i class="fa fa-list-ol"></i> List
 <i class="fa fa-plus" aria-hidden="true"></i> Add
 <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit
 $loop->iteration
 <div class="col" style="text-align: center">
    <button  style= "color:white" class="btn btn-primary" > <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit </button>
</div> 

@empty
    <p class="text-danger">
        <b>No Record Found. Add some records</b>
    </p>
@endforelse



{{-- <div class="row" id="parientDivOfbasicMedicineDiv">
    <div class="col">
        <div class="row" id="basicMedicineDiv" style="border: 1px solid black; padding : 5px !important ; margin-bottom:5px">
            <div class="col">
                <div class="row" style="margin-bottom: 3px !important">
                    <div class="col" style="padding-right : 1px !important">
                        {!! Form::selectMedicineGeneric('medicine_generic_id',null,['class'=>['form-control']]) !!}
                    </div>
                    <div class="col" style="padding-left : 1px !important">
                        {!! Form::selectMedicine('medicine_id',null,['class'=>['form-control']]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="padding-right : 1px !important"> 
                        {!! Form::text('frequency',null,['class'=>['form-control'],'placeholder'=>'Drug Frequency']) !!}
                    </div>
                    <div class="col" style="padding-left : 1px !important"> 
                        {!! Form::text('note',null,['class'=>['form-control'],'placeholder'=>'Short Note']) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>	
</div> --}}

<div class="row">
    <div class="col text-right" >
        <button id="addMoreMedicine" type="button" class="btn btn-sm bg-success-light" title="Add More Medicine"> 
            <i class="fas fa-plus"></i> More
        </button>
    </div>
</div>