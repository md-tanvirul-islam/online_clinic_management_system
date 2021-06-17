<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'patient_medical_history',
    ];

    public function appointment()
    {
        return  $this->belongsTo(Appointment::class,'appointment_id','id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id','id');
    }

}
