<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserProfile extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='userProfile';

    protected $fillable = [
        'user_id',
        'username',
        'email',
        'firstName',
        'lastName',
        'fullName',
        'nonNetizen',
        'idNo',
        'passpord',
        'expiryDate',
        'issuingCountry',
        'DOB',
        'gender',
        'maritialStatus',
        'religion',
        'race',
        'phoneNo',
        'homeNo',
        'extensionNo',
        'tenant_id',
        'personalEmail',
    ];
}

