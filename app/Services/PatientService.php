<?php
    namespace App\Services;

use App\Models\Patient;

class PatientService
    {
        protected $fileHandelingService;
        public function __construct()
        {
         $this->fileHandelingService = new FileHandelingService();  
        }
    
        public function allPatients()
        {
            return Patient::all();
        }

        public function storeOrUpdate($data)
        {
            $user_id = auth()->user()->id;
            $folder = "doctors";
            if(empty($data['id']))
            {   
                $patient = new Patient();
                $patient->created_by = $user_id; 
            
                if(isset($data['image']))
                {
                    $patient->image = $this->fileHandelingService->uploadImage($data['image'],"uploads/patients/images/");
                }
                else{
                    $patient->image =null;
                }

                // $doctor->image = $this->fileHandelingService->imageStore($data,$folder);
            }
            else
            {
                $patient = Patient::whereId($data["id"])->first();
                $oldFile = $patient->image;
                $patient->updated_by = $user_id;  
                if(isset($data['image']))
                {
                    $patient->image = $this->fileHandelingService->uploadImage($data['image'],"uploads/patients/images/");
                }
                // $doctor->image = $this->fileHandelingService->imageUpdate($data,$folder,$oldImageName);  
            }
            
            $patient->name = $data['name'];
            $patient->email = $data['email'];
            $patient->address = $data['address'];
            $patient->phone = $data['phone'];
            $patient->birthDate = $data['birthDate'];
            $patient->gender = $data['gender'];
            $patient->bloodGroup = $data['bloodGroup'];
            return $patient->save() ? $patient : null;
        
        }
    }
?>