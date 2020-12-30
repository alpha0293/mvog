<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Validator;

class Diemthi extends Model
{
    //
    use Notifiable;
	
	protected $fillable = [
        'iddutu','idnam','diem','nam',
    ];

    public static function validator(array $data)
    {
		//dd($data);
        return Validator::make($data, [
        	'iddutu' => ['required','int'],
            'idnam' => ['required', 'int', 'max:255'],
			'diem' => ['required|numeric|between:0,99.99'],
        ]);
    }	
}
