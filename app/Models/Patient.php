<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Appointment;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
