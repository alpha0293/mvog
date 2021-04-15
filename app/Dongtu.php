<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Validator;

class Dongtu extends Model
{
	use Notifiable;
	protected $fillable = [
        'id','name','information','url',
    ];
    //
	
	public static function validator(array $data)
    {
		//dd($data);
        return Validator::make($data, [
            'name' => ['required','string'],
            'information' => ['required','string'],
        ],
        [
            'required' => ':attribute không được để trống',
            'string' => ':attribute chỉ được nhập kí tự',
        ],
        [
            'name' => 'Tên',
            'information' => 'Tình Trạng',
            'url' => 'Trang web',
        ]);
    }	
}
