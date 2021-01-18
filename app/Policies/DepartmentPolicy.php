<?php

namespace App\Policies;

use App\Models\Department;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy
{
    use HandlesAuthorization;

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

    public function edit(User $user,Department $department)
    {
        return false;
    }
    public function update(User $user)
    {
        return false;
    }
    public function show(User $user,Department $department)
    {
        return false;
    }
    public function delete(User $user,Department $department)
    {
        return false;
    }
    public function restore(User $user, Department $department)
    {
        //
    }

    public function forceDelete(User $user, Department $department)
    {
        //
    }
}
