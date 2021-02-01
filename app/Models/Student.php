<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Auth\Authenticatable; //
use Illuminate\Auth\MustVerifyEmail; //
use App\Notifications\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use App\Contracts\CanResetPassword as CanResetPasswordContract;
use App\Traits\StudentVerifyEmail;
use Illuminate\Foundation\Auth\Access\Authorizable; //

class Student extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use HasFactory, Notifiable, Authenticatable, Authorizable, MustVerifyEmail, CanResetPassword, StudentVerifyEmail;

    protected $guard = 'student';

    protected $fillable = [
        'name',
        'user',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
}
