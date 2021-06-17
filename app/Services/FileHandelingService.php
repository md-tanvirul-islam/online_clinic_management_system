<?php
namespace App\Services;
use App\Models\Doctor;
Class FileHandelingService
{

    public function imageStore($image,$directory= null)
    {
                $photo = $image;
                $photoExtension = $photo->getClientOriginalExtension();
                $photoName = time().'.'.$photoExtension;
                $photo->move("uploads/$directory/",$photoName);
                $data['photo'] = $photoName;
                return $data['photo'];
    }
    public function imageUpdate($data,$directory= null,$oldImageName=null)
    {
        $imagePath = "uploads/doctors/".$oldImageName;
        unlink($imagePath);
        $photo = $data['image'];
        $photoExtension = $photo->getClientOriginalExtension();
        $photoName = time().'.'.$photoExtension;
        $photo->move("uploads/$directory/",$photoName);
        $data['photo'] = $photoName;
        return $data['photo'];    
    }

    public function uploadImage($image,$directory = null,$oldFile = null)
    {
        $this->RemoveFile($oldFile);        
        $uniqueFileName = uniqid().time().'.'.$image->getClientOriginalExtension();
        $imageUrl = $directory.$uniqueFileName;
        $image->move($directory , $uniqueFileName);
        return $imageUrl ;
    }    
    public function RemoveFile($filePath)
    {
        if (file_exists($filePath)) 
        {
            unlink($filePath);            
            return true;
        }
        else
        {
        	return false;
        }
        
    }
}
?>