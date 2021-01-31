<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="name"><b>Enter Doctor Name:</b></label>
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder' => 'Doctor Name']) !!}
    </div>
    <div class="col-md-4 mb-3">
        <label for="email"><b>Enter Email Name:</b></label>
        {!! Form::text('email',null,['class'=>'form-control','required','placeholder' => 'Doctor Personal Email']) !!}
    </div>
    <div class="col-md-4 mb-3">
        <label for="department_id"><b>Department:</b></label>
        {!! Form::select('department_id',$departments,Null,['placeholder'=>'Select One','class'=>'form-control','required'] )!!}
    </div>
</div>

<div class="form-row">
    <div class="col-md-8 mb-3">
        <label for="address"><b> Address:</b></label>
        {!! Form::text('address',null,['class'=>'form-control','required','placeholder' => "Doctor's Address"]) !!}
    </div>
    <div class="col-md-4 mb-3">
        <label for="email"><b>Date of Birth:</b></label>
        {!! Form::date('birthDate',null,['class'=>'form-control','required']) !!}
    </div>
</div>
<small> Contract Numbers </small>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="mobileNo"> <b>Phone Number:</b></label>
        {!! Form::text('mobileNo',null,['class'=>'form-control','required','placeholder' => "Phone Number"]) !!}
    </div>
    <div class="col-md-6 mb-3">
        <label for="phoneNo"><b>Telephone or Another Phone Number:</b></label>
        {!! Form::text('phoneNo',null,['class'=>'form-control','required','placeholder' => "Telephone Number"]) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="speciality"> <b>Specialities:</b></label>
        {!! Form::text('speciality',null,['class'=>'form-control','required','placeholder' => "Doctor's Specialities"]) !!}
    </div>
    <div class="col-md-8 mb-3">
        <label for="degree"><b>List the Doctor Degrees:</b></label>
        {!! Form::text('degree',null,['class'=>'form-control','required','placeholder' => "Doctor's Professional Degrees"]) !!}
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <b>Gender:</b> <br>
        <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Male" name="gender"  
                @if (\Route::currentRouteName()=== 'doctors.edit')  
                    {{ $doctor->gender==='Male'?'checked':null }}                       
                @endif>Male
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Female" name="gender"
                @if (\Route::currentRouteName()=== 'doctors.edit')                
                    {{ $doctor->gender==='Female'?'checked':null }}             
                @endif>Female
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Other" name="gender"
                @if (\Route::currentRouteName()=== 'doctors.edit')                
                    {{ $doctor->gender==='Other'?'checked':null }}             
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

<div class="form-row">
    <div class="col-md-6 mb-3">
        <small>Fees</small>
        <div class="row">
            <div class="col-md-12">
                <label for="feeNew"> <b>New Patient Consultation Fee:</b></label>
                {!! Form::text('feeNew',null,['class'=>'form-control','required','placeholder' => "New Patient Fee"]) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="feeInMonth"><b>Consultation Fee(in Same Month):</b></label>
                {!! Form::text('feeInMonth',null,['class'=>'form-control','required','placeholder' => "Consultation Fee(in Same Month)"]) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="feeReport"><b>Consultation Fee for Report:</b></label>
                {!! Form::text('feeReport',null,['class'=>'form-control','required','placeholder' => "Consultation Fee for Report"]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <br>
        <label for="bio"><b>Write a Short Bio about Doctor:</b></label>
        {!! Form::textarea('bio',null,['class'=>'form-control', 'rows'=>"7",'placeholder' => "Short Bio about Doctor"]) !!}
    </div>
</div>




