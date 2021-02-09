<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Services\ApiResponseService;
use App\Services\DepartmentService;
use Illuminate\Http\Request;
use App\Http\Resources\DepartmentResource;

class DepartmentController extends Controller
{
    protected $departmentService;
    protected $apiResponseService;

    public $successStatus = 200;


    public function __construct()
    {
        $this->departmentService = new DepartmentService();
        $this->apiResponseService = new ApiResponseService();
    }
    public function getAllDepartments() 
    {
        $departments = $this->departmentService->allDepartments();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Department List',
            'data' => [
                'departments' => DepartmentResource::collection($departments)
            ]
        ], 200);
       
    }
    public function createDepartment(Request $request) {
        // logic to create a student record goes here
    }
  
    public function getDepartment($id) {
        // logic to get a student record goes here
    }
  
    public function updateDepartment(Request $request, $id) {
        // logic to update a student record goes here
    }
  
    public function deleteDepartment($id) {
        // logic to delete a student record goes here
    }
}
