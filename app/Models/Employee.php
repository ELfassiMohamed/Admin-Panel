<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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
        'phone'
    ];

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
