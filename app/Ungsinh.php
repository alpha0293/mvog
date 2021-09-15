<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Validation\Rule;
class Ungsinh extends Model
{
    protected $fillable = [
        'email','holyname','fullname','name','dob','parish','year','phonenumber','province',
    ];
}
