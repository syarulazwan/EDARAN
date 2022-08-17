<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='employee';

    protected $fillable = [
        'user_id',
        'company',
        'department',
        'unit',
        'branch',
        'jobGrade',
        'designation',
        'employmentType',
        'userRole',
        'supervisor',
        'joinedDate',
        'COR',
        'employeeId',
        'employeeName',
        'employeeEmail',
        'effectiveFrom',
        'event',
    ];
}


