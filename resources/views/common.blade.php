

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