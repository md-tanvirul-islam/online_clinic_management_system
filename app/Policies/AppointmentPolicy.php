<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentPolicy
{
    use HandlesAuthorization;

    public function before(User $user,$ability)
    {
        if($user->type === 'admin')
        {
            return true;
        }
    }






    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Appointment $appointment)
    {
        //
    }

   
    public function create(User $user)
    {
        //
    }

   
    public function update(User $user, Appointment $appointment)
    {
        //
    }

   
    public function delete(User $user, Appointment $appointment)
    {
        //
    }

   
    public function restore(User $user, Appointment $appointment)
    {
        //
    }

    public function forceDelete(User $user, Appointment $appointment)
    {
        //
    }
}
