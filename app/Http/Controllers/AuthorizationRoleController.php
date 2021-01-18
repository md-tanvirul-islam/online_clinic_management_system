<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

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
    
    public function rolePermissionList(Role $role)
    {
        try{
            $permissions = Permission::all(); 
            $permissionIdsForThisRole = DB::table('role_has_permissions')
                                ->where('role_id','=',$role->id)
                                ->pluck('permission_id')->toArray();
            // dd($permissionIdsForThisRole);
            return view('backend.admin.authorization.roles.PermissionsAssociatedWithRole.list',compact('role','permissions','permissionIdsForThisRole'));
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
