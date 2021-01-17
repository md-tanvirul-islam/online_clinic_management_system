<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AssignRoleForUser extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.admin.authorization.assignRole.index',compact('users'));
    }

    public function edit($user_id)
    {
        $user  = User::find($user_id);
        return view('backend.admin.authorization.assignRole.edit',compact('user'));
    }

    public function add(Request $request,$user_id)
    {

        $request->validate([
            'role_id'=>'required|integer'
        ]);
        $user = User::find($user_id);
        DB::table('model_has_roles')->insert([
            'model_id' => $user->id,
            'model_type'=>'App\Models\User',
            'role_id' => $request->role_id
        ]);
        return view('backend.admin.authorization.assignRole.edit',compact('user'));
    }

    public function remove(Request $request,$user_id)
    {
        $request->validate([
            'role_id'=>'required|integer'
        ]);
        $user = User::find($user_id);
        DB::table('model_has_roles')->where('role_id', '=',$request->role_id)->where('model_id', '=', $user->id )->delete();
        return view('backend.admin.authorization.assignRole.edit',compact('user'));
    }
}
