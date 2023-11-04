<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'image',
        'full_name',
        'first_name',
        'last_name',
        'employee_role',
        'employee_status',
        'address',
        'birth_date',
        'email',
        'phone',
        'password'
    ];

    // protected $hidden = [
    //     'birth_date',

    // ];

    // public function getAuthPassword()
    //         {
    //             return $this->birth_date;
    //         }

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
