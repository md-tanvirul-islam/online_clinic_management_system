<?php

namespace App\Http\Controllers;

use App\Services\DepartmentService;
use Illuminate\Http\Request;

class ApiDepartmentController extends Controller
{
    protected $departmentService;

    public function __construct()
    {
        $this->departmentService = new DepartmentService();
    }
    public function getAllDepartments() 
    {
        $departments = $this->departmentService->allDepartments();
        return response()->json($departments,200);
       
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
