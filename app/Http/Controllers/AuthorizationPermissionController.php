<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class AuthorizationPermissionController extends Controller
{
    public function list()
    {
        $permissions = Permission::all()->sortBy('name');
        return view('backend.admin.authorization.permissions.index',compact('permissions'));
    }
    public function create()
    {
        return view('backend.admin.authorization.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|unique:permissions,name|required'
        ]);
       
        try{
            $permission = new Permission();
            $permission->name = strtolower($request->name);
            // $role->guard_name = 'web';
            $permission->save(); 
            session()->flash("success", "The Permission Name has been successfully added");
            // return redirect()->route('authorization.permission.list');
            return redirect()->back();
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function edit(Permission $permission)
    {
        return view('backend.admin.authorization.permissions.edit',compact('permission'));
    }

    public function update(Request $request,Permission $permission)
    {
        $request->validate([
            'name' => [
                'string',
                'required',
                Rule::unique('users')->ignore($permission),
            ],
        ]);
       
        try{
            $permission->name = strtolower($request->name);
            $permission->save(); 
            session()->flash("success", "The permission name has been successfully updated");
            return redirect()->route('authorization.permission.list');
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function destroy(Permission $permission)
    {
        try{
            
            $permission->delete(); 
            session()->flash("success", "The Permission has been successfully delected");
            return redirect()->route('authorization.permission.list');
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
    
}
