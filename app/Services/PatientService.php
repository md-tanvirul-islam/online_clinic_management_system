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
                if(empty($data['patient_id']))
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
                    $patient = Patient::whereId($data["patient_id"])->first();
                    $oldFile = $patient->image;
                    $patient->updated_by = $user_id;  
        
                    if(isset($data['image']))
                    {
                        $image = $this->fileHandelingService->uploadImage($data['image'],"uploads/patients/images/");
                    }
                    // dd($data['image'] ,$image );
                    // $doctor->image = $this->fileHandelingService->imageUpdate($data,$folder,$oldImageName);  
                }
                
                $patient->name = $data['name'];
                $patient->email = $data['email']??null;
                $patient->address = $data['address']??null;
                $patient->phone = $data['phone'];
                $patient->image = $image??null;
                $patient->birthDate = $data['birthDate']??null;
                $patient->gender = $data['gender']??null;
                $patient->bloodGroup = $data['bloodGroup']??null;
                return $patient->save() ? $patient : null;
            
            }

            public function getDropdownList()
            {
                return Patient::pluck('name','id');
            }
        }
?>