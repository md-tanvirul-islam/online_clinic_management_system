<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    
    public function created(User $user)
    {
        // dd('form user observer class', $user);
    }

   
    public function updated(User $user)
    {
        //
    }

  
    public function deleted(User $user)
    {
        //
    }

 
    public function restored(User $user)
    {
        //
    }

    public function forceDeleted(User $user)
    {
        //
    }
}
