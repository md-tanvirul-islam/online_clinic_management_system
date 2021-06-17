<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AssignPermissionForRoleService;

class AssignPermissionForRole extends Controller
{
    protected $assignPermissionForRoleService ;

    public function __construct()
    {
        $this->assignPermissionForRoleService = new AssignPermissionForRoleService();
    }
    public function store(Request $resquest)
    {
        $role_id = $resquest->role_id;
        $requestedPermissionLists = $resquest->except(['_token','role_id']);
        $requestedPermission_ids = array_keys( $requestedPermissionLists);
        $this->assignPermissionForRoleService->store($role_id,$requestedPermission_ids);
        return redirect()->back()->with('success','Successfully Updated');
        
    }
}
