
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="name"><b>Enter Patient Name:</b></label>
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder' => 'Patient Name']) !!}
    </div>
    <div class="col-md-4 mb-3">
        <label for="email"><b>Enter Email Name:</b></label>
        {!! Form::text('email',null,['class'=>'form-control','required','placeholder' => 'Patient Personal Email']) !!}
    </div>
    <div class="col-md-4 mb-3">
        <label for="email"><b>Date of Birth:</b></label>
        {!! Form::date('birthDate',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="phone"> <b>Patient Phone Number:</b></label>
        {!! Form::text('phone',null,['class'=>'form-control','required','placeholder' => "Phone Number"]) !!}
    </div>
    <div class="col-md-6 mb-3">
        <label for="address"><b>Address:</b></label>
        {!! Form::text('address',null,['class'=>'form-control','required','placeholder' => "Patient Address"]) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <b>Gender:</b> <br>
        <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Male" name="gender"  
                @if (\Route::currentRouteName()=== 'patients.edit')                
                    {{ $patient->gender==='Male'?'checked':null }}             
                @endif>Male
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Female" name="gender"
                @if (\Route::currentRouteName()=== 'patients.edit')                
                    {{ $patient->gender==='Female'?'checked':null }}             
                @endif>Female
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Other" name="gender"
                @if (\Route::currentRouteName()=== 'patients.edit')                
                    {{ $patient->gender==='Other'?'checked':null }}             
                @endif>
              Other
            </label>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="bloodGroup"><b>Blood Group:</b></label>
        {!! Form::select('bloodGroup',['A+'=>'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','AB+'=>'AB+','AB-'=>'AB-','O+'=>'O+','O-'=>'O-'],Null,['placeholder'=>'Select One','class'=>'form-control'] )!!}
    </div>
</div>



