<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Link extends Model
{
    //
    protected $fillable = [
        'name','url','status',
    ];

    public static function validator(array $data)
    {
		//dd($data);
        return Validator::make($data, [
			'name' => ['required','string'],
            'url' => ['required', 'string'],
        ],
        [
            'required' => ':attribute không được để trống',
            'string' => ':attribute chỉ được nhập kí tự',
            'int' => ':attribute chỉ được nhập số',
        ],
        [
            'name' => 'Tên',
            'url' => 'Đường dẫn',
        ]);
    }	
}
