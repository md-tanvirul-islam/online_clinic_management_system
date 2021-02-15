<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientTest extends Model
{
    use HasFactory;

    protected $table = 'tests_with_bills';

    protected $fillable = [
        'patient_id','test_id','testType_id','bill_for_test_id','invoice','created_by'
    ];

    public function testBill()
    {
        return $this->belongsTo(BillForTest::class,'id','billForTest_id');
    } 
}
