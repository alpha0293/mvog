<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Document extends Model
{
    //
    protected $fillable = [
        'name','url',
    ];

    public static function validator(array $data)
    {
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
