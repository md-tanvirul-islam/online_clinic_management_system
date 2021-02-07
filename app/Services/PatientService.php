<?php
    namespace App\Services;

    use App\Models\Patient;
    use Illuminate\Support\Facades\Hash;
    use App\Models\User;

    class PatientService
        {
            protected $fileHandelingService;
            public function __construct()
            {
            $this->fileHandelingService = new FileHandelingService();  
            }
        
            public function allPatients()
            {
                return patient::all();
            }

            public function storeOrUpdate($data)
            {
                // dd($data , 'patient service');
                $auth_user_id = auth()->user()->id;
                if(empty($data['patient_id']))
                {   
                    //first created user in user table for login 
                    $patientUser = User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'type' => 'patient',
                        'password' => Hash::make('password'),
                    ]);

                    // now create the doctor profile and set the user_id with above variable $doctorUser

                    $patientProfile = new Patient();
                    $patientProfile->created_by = $auth_user_id; 
                    $patientProfile->user_id = $patientUser->id; 
                
                    if(isset($data['image']))
                    {
                        $patientProfile->image = $this->fileHandelingService->uploadImage($data['image'],"uploads/patients/images/");
                    }
                    else{
                        $patientProfile->image =null;
                    }

                    // $doctor->image = $this->fileHandelingService->imageStore($data,$folder);
                }
                else
                {
                    $patientProfile = Patient::whereId($data["patientProfile_id"])->first();
                    $oldFile = $patientProfile->image;
                    $patientProfile->updated_by = $auth_user_id;  
        
                    if(isset($data['image']))
                    {
                        $patientProfile->image = $this->fileHandelingService->uploadImage($data['image'],"uploads/patients/images/");
                    }
                    // dd($data['image'] ,$image );
                    // $doctor->image = $this->fileHandelingService->imageUpdate($data,$folder,$oldImageName);  
                }
                
                $patientProfile->name = $data['name'];
                $patientProfile->email = $data['email']??null;
                $patientProfile->address = $data['address']??null;
                $patientProfile->phone = $data['phone'];
                $patientProfile->image = $patientProfile->image??null;
                $patientProfile->birthDate = $data['birthDate']??null;
                $patientProfile->gender = $data['gender']??null;
                $patientProfile->bloodGroup = $data['bloodGroup']??null;
                return $patientProfile->save() ? $patientProfile : null;
            
            }

            public function getDropdownList()
            {
                return patient::pluck('name','id');
            }
        }
?>