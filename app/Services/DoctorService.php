<?php
namespace App\Services;

    use App\Models\Doctor;
    use App\Services\FileHandelingService;    

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
            $user_id = auth()->user()->id;
            $folder = "doctors";
            if(empty($data['id']))
            {   
                $doctor = new Doctor();
                $doctor->created_by = $user_id; 
                if(isset($data['image']))
                {
                    $doctor->image = $this->fileHandelingService->uploadImage($data['image'],"uploads/doctors/images/");
                }
                else{
                    $doctor->image =null;
                }
                
                // $doctor->image = $this->fileHandelingService->imageStore($data,$folder);
            }
            else
            {
                $doctor = Doctor::whereId($data["id"])->first();
                $oldFile = $doctor->image;
                $doctor->updated_by = $user_id; 
                if(isset($data['image']))
                {
                    $doctor->image = $this->fileHandelingService->uploadImage($data['image'],"uploads/doctors/images/",$oldFile);
                } 
               
                // $doctor->image = $this->fileHandelingService->imageUpdate($data,$folder,$oldImageName);  
            }
            
            $doctor->name = $data['name'];
            $doctor->email = $data['email'];
            $doctor->department_id = $data['department_id'];
            $doctor->address = $data['address'];
            $doctor->phoneNo = $data['phoneNo'];
            $doctor->mobileNo = $data['mobileNo'];
            $doctor->speciality = $data['speciality'];
            $doctor->degree = $data['degree'];
            $doctor->bio = $data['bio'];
            $doctor->birthDate = $data['birthDate'];
            $doctor->gender = $data['gender'];
            $doctor->bloodGroup = $data['bloodGroup'];
            $doctor->feeNew = $data['feeNew'];
            $doctor->feeInMonth  = $data['feeInMonth'];
            $doctor->feeReport = $data['feeReport'];
            return $doctor->save() ? $doctor : null;
        
        }

        public function getDropdownList()
            {
                return Doctor::pluck('name','id');
            }

        public function searchDoctor($data)
        {
            $doctors = Doctor::where('name','LIKE',"%".$data["searchData"]."%")
                            ->orWhere('phoneNo','=',$data['searchData'])
                            ->orWhere('feeNew','=',$data['searchData'])
                            ->orWhere('feeInMonth','=',$data['searchData'])
                            ->orWhere('feeReport','=',$data['searchData'])

                            ->orWhereHas('department' , function ($query) use($data) {
                                $query->Where("name", "LIKE", "%".$data["searchData"]."%");
                            })->simplePaginate(5);
            return $doctors;
        }
    }
?>
