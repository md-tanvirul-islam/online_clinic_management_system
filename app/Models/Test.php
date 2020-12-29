<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','testType_id','price'
    ];

    public function testType()
    {
        return $this->belongsTo(TestType::class,'testType_id','id');
    }
}
