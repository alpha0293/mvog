<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Validator;

class Paper extends Model
{
	use Notifiable;
	protected $fillable = [
        'name', 'url',
    ];
    //
	public static function validator(array $data)
    {
		//dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
        ]);
    }	

    public function getpaper()
    {
        return $this->hasMany('App\PaperDutu','idpaper','id');
    }
}
