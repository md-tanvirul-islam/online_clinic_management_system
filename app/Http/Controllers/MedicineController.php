<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Services\MedicineService;
use Illuminate\Database\QueryException;

class MedicineController extends Controller
{

    protected $medicineService;

    public function __construct()
    {
        $this->medicineService = new MedicineService();
    }
    
    public function index()
    {
        $medicines = $this->medicineService->list();
        return view('backend.admin.medicines.index',compact('medicines'));
    }

    
    public function create()
    {
        return view('backend.admin.medicines.create');
    }

    
    public function store(StoreMedicineRequest $request)
    {

        try {
            $data = $request->all();
            $medicine = $this->medicineService->storeOrUpdate($data);
            return redirect()->back()->with('success','Medicine info has added successfully');
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

   
    public function show(Medicine $medicine)
    {
        // return view('backend.admin.medicineGenerics.edit',compact('medicineGeneric'));
    }

   
    public function edit(Medicine $medicine)
    {
        return view('backend.admin.medicines.edit',compact('medicine'));
    }

  
    public function update(UpdateMedicineRequest $request, Medicine $medicine)
    {
        
        try {
            $data = $request->all();
            $data['medicine_id'] = $medicine->id;
            $medicine = $this->medicineService->storeOrUpdate($data);
            return redirect()->back()->with('success','Medicine info has Updated successfully');
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function destroy(Medicine $medicine)
    {
        try {
            $medicine->delete();
            return redirect()->route('medicines.index')->withSuccess("Delete Successful"  );
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
