<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Validator;

class Mail extends Model
{
	use Notifiable;
	protected $fillable = [
        'id','content','sentto',
    ];
    //
	
	public static function validator(array $data)
    {
		//dd($data);
        return Validator::make($data, [
			'content' => ['required','string'],
            'sentto' => ['required', 'string'],
        ]);
    }	
}
