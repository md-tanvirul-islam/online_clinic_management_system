<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class AuthorizationRoleController extends Controller
{
    public function roleList()
    {
        $roles = Role::all();
        return view('backend.admin.authorization.roles.index',compact('roles'));
    }
    public function roleCreate()
    {
        return view('backend.admin.authorization.roles.create');
    }

    public function roleStore(Request $request)
    {
        $request->validate([
            'name' => 'string|unique:roles,name|required'
        ]);
       
        try{
            $role = new Role();
            $role->name = strtolower($request->name);
            // $role->guard_name = 'web';
            $role->save(); 
            session()->flash("success", "The Role has been successfully created");
            return redirect()->route('authorization.roles.list');
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function roleEdit(Role $role)
    {
        return view('backend.admin.authorization.roles.edit',compact('role'));
    }

    public function roleUpdate(Request $request,Role $role)
    {
        $request->validate([
            'name' => [
                'string',
                'required',
                Rule::unique('users')->ignore($role),
            ],
        ]);
       
        try{
            $role->name = strtolower($request->name);
            $role->save(); 
            session()->flash("success", "The Role has been successfully updated");
            return redirect()->route('authorization.roles.list');
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function roleDestroy(Role $role)
    {
        try{
            
            $role->delete(); 
            session()->flash("success", "The Role has been successfully delected");
            return redirect()->route('authorization.roles.list');
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
    
}
