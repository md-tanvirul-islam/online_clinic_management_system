<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillForTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'date','amount','paid',
    ];

    public function patientTest()
    {
        return $this->hasMany(PatientTest::class);
    }
}


