<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;

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
}
