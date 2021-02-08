<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\ApiResponseService;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{
    protected $apiResponseService;
    
    public function __construct()
    {
        $this->apiResponseService = new ApiResponseService();
    }

    public function generateToken(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            $error = 'Your Email and Password are incorrect';
            return $this->apiResponseService->sendError($error); 
        }
        return $user->createToken($user->name)->plainTextToken;
    
    }
}
