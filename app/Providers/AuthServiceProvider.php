<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Appointment' => 'App\Policies\AppointmentPolicy',
        'App\Models\Department' => 'App\Policies\DepartmentPolicy',
        'App\Models\Doctor' => 'App\Policies\DoctorPolicy',
        'App\Models\DoctorSchedule' => 'App\Policies\DoctorSchedulePolicy',
        'App\Models\Patient' => 'App\Policies\PatientPolicy',
        'App\Models\Test' => 'App\Policies\TestPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('user_type',function(User $user){
            dd($user->type);
        });
    }
}
