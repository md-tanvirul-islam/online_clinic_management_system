<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="testType_id">Select the Test Category:</label>
        {!! Form::selectTestType('testType_id',null,['placeholder' => 'Select One','class'=>'form-control','required']) !!}
    </div>
    <div class="col-md-4 mb-3">
        <label for="name">Enter a Name of the Test:</label>
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder' => 'Test Name']) !!}
    </div>
    <div class="col-md-4 mb-3">
        <label for="price">Enter the price of the test:</label>
        {!! Form::text('price',null,['class'=>'form-control','required','placeholder' => 'Test Price']) !!}
    </div>
</div>