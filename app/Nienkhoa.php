<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nienkhoa extends Model
{
    //
    protected $fillable = [
        'khoa','nienkhoa',
    ];

    public static function validator(array $data)
    {
		//dd($data);
        return Validator::make($data, [
			'khoa' => ['required','string'],
            'nienkhoa' => ['required', 'string'],
        ],
        [
            'required' => ':attribute không được để trống',
            'string' => ':attribute chỉ được nhập kí tự',
            'int' => ':attribute chỉ được nhập số',
        ],
        [
            'khoa' => 'Khoá',
            'nienkhoa' => 'Niên khoá',
        ]);
    }	
}
