<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Validator;

class PaperDutu extends Model
{
	use Notifiable;
	protected $fillable = [
        'id','iddutu','idpaper','url','status',
    ];
    //
	
	public static function validator(array $data)
    {
		//dd($data);
        return Validator::make($data, [
			'iddutu' => ['required','int'],
            'idpaper' => ['required', 'int'],
			'url' => ['required', 'string', 'max:255'],
        ]);
    }	
}
