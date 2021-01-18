<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;

class AssignPermissionForRoleService
{
    public function store($role_id,$requestedPermission_ids)
    {
        $permissionIdsForThisRole = DB::table('role_has_permissions')
                                ->where('role_id','=',$role_id)
                                ->pluck('permission_id')->toArray();
        // the above code to get the permissionIdsForThisRole before insert or update for requested ids
        if(isset($permissionIdsForThisRole)) // if first time permissions are adds for this role, the else block will run . otherwise the if block will run
        {
            foreach($requestedPermission_ids as $requestedPermission_id)
            {
                if(!in_array($requestedPermission_id,$permissionIdsForThisRole))
                {
                    DB::table('role_has_permissions')
                        ->insert([
                            'permission_id' => $requestedPermission_id,
                            'role_id'=>$role_id,
                        ]);
                }
            }
        }
        else {
            foreach($requestedPermission_ids as $requestedPermission_id)
            {
                DB::table('role_has_permissions')
                    ->insert([
                            'permission_id' => $requestedPermission_id,
                            'role_id'=>$role_id,
                        ]);               
            }
        }
       
       // the above code for permissionIdsForThisRole after insert or update for requested its.
       $permissionIdsForThisRole = DB::table('role_has_permissions')
                                    ->where('role_id','=',$role_id)
                                    ->pluck('permission_id')->toArray();

       $removePermissionIds = array_diff($permissionIdsForThisRole,$requestedPermission_ids);
       if(isset($removePermissionIds))
       {
           foreach($removePermissionIds as $removePermissionId)
           {
                DB::table('role_has_permissions')
                ->where('role_id','=',$role_id)
                ->where('permission_id','=',$removePermissionId)
                ->delete();
           }
        
       }
        
    }
}
?>