<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'image',
        'birthDate',
        'gender',
        'bloodGroup',
    ];

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

}
