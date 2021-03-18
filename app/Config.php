<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Config extends Model
{
    //
    protected $fillable = [
        'id','title','loichua','timediemdanhlai','tilevang','diemxetquanam','tuoithidcv','logo','banner','footer','backgroundcolor','barcolor',
    ];

    public static function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required','string'],
			'loichua' => ['required','string'],
			'timediemdanhlai' => ['required','int'],
			'tilevang' => ['required','numeric','between:0,100'],
			'diemxetquanam' => ['required','numeric','between:0,10'],
			'tuoithidcv' => ['required','int'],
			'logo' => ['required','string'],
			'banner' => ['required','string'],
			'footer' => ['required','string'],
			'backgroundcolor' => ['required','string'],
			'barcolor' => ['required','string'],
        ]);
    }	
}
