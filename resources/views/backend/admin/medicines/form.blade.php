<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="brand_name">Enter a Brand Name:</label>
        {!! Form::text('brand_name',null,['class'=>'form-control','required','placeholder' => 'Brand Name']) !!}
    </div>
    <div class="col-md-3 mb-3">
        <label for="generic_id">Select The Generic Name:</label>
        {!! Form::selectMedicineGeneric('generic_id',null,['class'=>['form-control','js-select2'],'required','placeholder' => 'Generic Name']) !!}
    </div>
    <div class="col-md-5 mb-3">
        <label for="form">Enter Medicine Form::</label>
        {!! Form::text('form',null,['class'=>'form-control','required','placeholder' => 'Capsul,Syrup,Injection,Inhaler etc...']) !!}
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="dosage_description">Medicine Dosage Description:</label>
        {!! Form::textarea('dosage_description',null,['class'=>'form-control','rows'=>'4','cols'=>'50','placeholder' => 'Please Write Medicine Dosage Description !!!']) !!}
    </div>
    <div class="col-md-6 mb-3">
        <label for="other_info">Medicine Other Info:</label>
        {!! Form::textarea('other_info',null,['class'=>'form-control','rows'=>'4','cols'=>'50','placeholder' => 'Please Medicine Other Info like side effects  !!!']) !!}
    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="strength">Medicine Strength:</label>
        {!! Form::text('strength',null,['class'=>'form-control','placeholder' => '200 ml or 400 ml ']) !!}
    </div>
    <div class="col-md-4 mb-3">
        <label for="status">Status:</label>
        {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','required','placeholder' => 'Please Select Status']) !!}
    </div>
</div>