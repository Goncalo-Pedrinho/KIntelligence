<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;  
use Laravel\Lumen\Auth\Authorizable;  
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract; 
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract; 
use Illuminate\Database\Eloquent\Factories\HasFactory;



use Tymon\JWTAuth\Contracts\JWTSubject;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'birth', 'email','address','nif', 'phoneNumber', 'cc', 'civilState', 'nib', 'nss', 'dependents', 'category', 'password', 'state'
    ];
   
}
