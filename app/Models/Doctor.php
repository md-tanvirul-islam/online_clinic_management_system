<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\user;
use Illuminate\Notifications\Notifiable;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'department_id',
        'address',
        'phoneNo',
        'mobileNo',
        'image',
        'speciality',
        'degree',
        'bio',
        'birthDate',
        'gender',
        'bloodGroup',
        'feeNew',
        'feeInMonth',
        'feeReport',

    ];

    public function getGenderAttribute($value)
    {
        return ucfirst($value);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    
}
