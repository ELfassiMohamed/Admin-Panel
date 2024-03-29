<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Department;
use Illuminate\Support\Str;
use App\Enums\EmployeeRoles;
use App\Enums\EmployeeStatus;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'image',
        'first_name',
        'last_name',
        'employee_number',
        'employee_role',
        'employee_status',
        'department',
        'sex',
        'birth_date',
        'email',
        'phone',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'employee_status' => EmployeeStatus::class,
        'employee_role' => EmployeeRoles::class,
        'department' => Department::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(
        function ($employee) {
            // Generate and set the employee number
            $employee->employee_number = static::generateEmployeeNumber();
            $employee->password = static::generatePassword($employee->last_name, $employee->employee_number);
            $employee->email = static::generateEmployeeEmail($employee->first_name , $employee->last_name);
        });
    }

    // Custom method to generate an employee number
    protected static function generateEmployeeNumber()
    {
        //return 'EMP' . uniqid();
        //or generate random string plus random number
        return strtoupper(Str::random(2)). rand(1000, 99999);
    }

    protected static function generatePassword($lastName, $employeeNumber)
    {
        // You can customize the password generation logic based on your requirements
        return Hash::make($employeeNumber);
    }

    protected static function generateEmployeeEmail($FirstName , $lastName){
        return strtolower($lastName .'.'. $FirstName .'@test.com');
    }
}
