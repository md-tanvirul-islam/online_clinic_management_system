<?php

namespace App\Policies;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatientPolicy
{
    use HandlesAuthorization;

    public function before(User $user,$ability)
    {
        if($user->type === 'admin')
        {
            return true;
        }
    }

    public function access(User $user)
    {
        return false;
    }
    public function list(User $user)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function edit(User $user,$ability)
    {
        return false;
    }
    public function update(User $user)
    {
        return false;
    }
    public function show(User $user,$ability)
    {
        return false;
    }
    public function delete(User $user,$ability)
    {
        return false;
    }
    public function restore(User $user, $ability)
    {
        //
    }

    public function forceDelete(User $user, $ability)
    {
        //
    }
}
