<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;
    

    protected $guard = 'employee';
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

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
