<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class client extends Model
{
    use HasFactory,HasApiTokens;

    protected $fillable =[
        'firstname',
        'middlename',
        'lastname',
        'email',
        'password'
    ];

    protected $hidden = ['password'];
}
