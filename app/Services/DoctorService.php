<?php
namespace App\Services;

    use App\Models\Doctor;
use App\Models\User;
use App\Services\FileHandelingService;   
use Illuminate\Support\Facades\Hash; 

class DoctorService
    {
        protected $fileHandelingService;
        public function __construct()
        {
         $this->fileHandelingService = new FileHandelingService();  
        }
    
        public function allDoctors()
        {
            return Doctor::simplePaginate(10);
        }

        public function storeOrUpdate($data)
        {
            // dd($data);
            $user_id = auth()->user()->id;
            $folder = "doctors";
            if(empty($data['id']))
            {  
                // first created user in user table for login 
                $doctorUser = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'type' => 'doctor',
                    'password' => Hash::make('password'),
                ]);

                // now create the doctor profile and set the user_id with above variable $doctorUser
                $doctorProfile = new Doctor();
                $doctorProfile->created_by = $user_id; 
                $doctorProfile->user_id = $doctorUser->id; 
                if(isset($data['image']))
                {
                    $doctorProfile->image = $this->fileHandelingService->uploadImage($data['image'],"uploads/doctors/images/");
                }
                else{
                    $doctorProfile->image =null;
                }
                
                // $doctorProfile->image = $this->fileHandelingService->imageStore($data,$folder);
            }
            else
            {
                $doctorProfile = Doctor::whereId($data["id"])->first();
                $oldFile = $doctorProfile->image;
                $doctorProfile->updated_by = $user_id; 
                if(isset($data['image']))
                {
                    $doctorProfile->image = $this->fileHandelingService->uploadImage($data['image'],"uploads/doctors/images/",$oldFile);
                } 
               
                // $doctorProfile->image = $this->fileHandelingService->imageUpdate($data,$folder,$oldImageName);  
            }
            
            $doctorProfile->name = $data['name'];
            $doctorProfile->email = $data['email'];
            $doctorProfile->department_id = $data['department_id'];
            $doctorProfile->address = $data['address'];
            $doctorProfile->phoneNo = $data['phoneNo'];
            $doctorProfile->mobileNo = $data['mobileNo'];
            $doctorProfile->speciality = $data['speciality'];
            $doctorProfile->degree = $data['degree'];
            $doctorProfile->bio = $data['bio'];
            $doctorProfile->birthDate = $data['birthDate'];
            $doctorProfile->gender = $data['gender'];
            $doctorProfile->bloodGroup = $data['bloodGroup'];
            $doctorProfile->feeNew = $data['feeNew'];
            $doctorProfile->feeInMonth  = $data['feeInMonth'];
            $doctorProfile->feeReport = $data['feeReport'];
            return $doctorProfile->save() ? $doctorProfile : null;
        
        }

        public function getDropdownList()
            {
                return Doctor::pluck('name','id');
            }

        public function searchDoctor($data)
        {
            $doctorProfiles = Doctor::where('name','LIKE',"%".$data["searchData"]."%")
                            ->orWhere('phoneNo','=',$data['searchData'])
                            ->orWhere('feeNew','=',$data['searchData'])
                            ->orWhere('feeInMonth','=',$data['searchData'])
                            ->orWhere('feeReport','=',$data['searchData'])

                            ->orWhereHas('department' , function ($query) use($data) {
                                $query->Where("name", "LIKE", "%".$data["searchData"]."%");
                            })->simplePaginate(5);
            return $doctorProfiles;
        }
    }
?>
