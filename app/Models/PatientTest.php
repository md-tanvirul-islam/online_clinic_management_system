<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id','test_id','testType_id','billForTest_id','invoice'
    ];

    public function testBill()
    {
        return $this->belongsTo(BillForTest::class,'id','billForTest_id');
    } 
}
