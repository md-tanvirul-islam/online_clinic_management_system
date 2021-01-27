<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'doctor_schedule_id',
        'patient_id',
        'date',
        'patient_status',
    ];

    public function patientProfile()
    {
        return $this->belongsTo(Patient::class,'patient_id','id');
    }

    public function prescription()
    {
        return $this->hasOne(Prescription::class);
    }
}
