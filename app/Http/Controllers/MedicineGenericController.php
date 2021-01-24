<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicineGenericRequest;
use App\Http\Requests\UpdateMedicineGenericRequest;
use App\Models\MedicineGeneric;
use App\Services\MedicineGenericService;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class MedicineGenericController extends Controller
{
    protected $medicineGenericService;

    public function __construct()
    {
        $this->medicineGenericService = new MedicineGenericService();
    }
    
    public function index()
    {
        $medicineGenerics = $this->medicineGenericService->list();
        return view('backend.admin.medicineGenerics.index',compact('medicineGenerics'));
    }

    
    public function create()
    {
        return view('backend.admin.medicineGenerics.create');
    }

    
    public function store(StoreMedicineGenericRequest $request)
    {
        try {
            $data = $request->all();
            $medicineGeneric = $this->medicineGenericService->storeOrUpdate($data);
            return redirect()->back()->with('success','Medicine Generic Name has added successfully');
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

   
    public function show(MedicineGeneric $medicineGeneric)
    {
        // return view('backend.admin.medicineGenerics.edit',compact('medicineGeneric'));
    }

   
    public function edit(MedicineGeneric $medicineGeneric)
    {
        return view('backend.admin.medicineGenerics.edit',compact('medicineGeneric'));
    }

  
    public function update(UpdateMedicineGenericRequest $request, MedicineGeneric $medicineGeneric)
    {
        try {
            $data = $request->all();
            $data['medicineGeneric_id'] = $medicineGeneric->id;
            $medicineGeneric = $this->medicineGenericService->storeOrUpdate($data);
            return redirect()->back()->with('success','Medicine Generic Name has Updated successfully');
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function destroy(MedicineGeneric $medicineGeneric)
    {
        try {
            $medicineGeneric->delete();
            return redirect()->route('medicineGenerics.index')->withSuccess("Delete Successful"  );
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
