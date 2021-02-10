<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\PatientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class SocialAuthController extends Controller
{
    protected $patientService;
    
    public function __construct()
    {
        $this->patientService = new PatientService();
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $google_user = Socialite::driver('google')->user();
        $user = User::where('email','=',$google_user->email)
                    ->where('media','=','google')
                    ->where('media_id','=',$google_user->id)->first();
        // dd($google_user->name,$google_user->email,$google_user->id);
        if(!$user)
        {
            // register the new user and login
            $patient['name'] = $google_user->name ;
            $patient['email'] = $google_user->email ;
            $patient['media'] = 'google' ;
            $patient['media_id'] = $google_user->id ;
            $patient['social_image'] = $google_user->avatar ;
            $createdPatient = $this->patientService->storeOrUpdate($patient);

            Auth::login($createdPatient->user);
            return redirect()->route('patient.own.dashboard');
        }
        else{
            // login old user
            Auth::login($user);
            return redirect()->route('patient.own.dashboard');
        }

        // $user->token
    }
}
