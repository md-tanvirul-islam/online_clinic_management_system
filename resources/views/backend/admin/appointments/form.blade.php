{{-- @php
    $daysOfTheWeek = config('constant.daysOfTheWeek');
    $daysOfWeek = config('constant.daysOfTheWeek');   
    dd($daysOfTheWeek);
@endphp --}}



<div class="table">
    <div class="row" style="margin-bottom:5px">
        <div class="col-4 text-center font-weight-bold"> 
            Day
        </div>
        <div class="col-4 text-center font-weight-bold"> 
            Begaining Time
        </div>
        <div class="col-4 text-center font-weight-bold"> 
            Finishing Time
        </div>
    </div>
    
    @php
    $daysOfTheWeek = config('constant.daysOfTheWeek');    
    @endphp
    <div class="row ">
        <div class="col-4"> 
            {!! Form::select('day',$daysOfTheWeek,Null,['placeholder'=>'Select Day','class'=>'form-control','required'] )!!}  
        </div>
        <div class="col-4 "> 
            {!! Form::text('starting_time',null,['placeholder'=>'write like 08:00 PM','class'=>'form-control']) !!}
        </div>
        <div class="col-4"> 
            {!! Form::text('ending_time',null,['placeholder'=>'write like 10:00 PM','class'=>'form-control']) !!}
        </div>
    </div>

</div>


