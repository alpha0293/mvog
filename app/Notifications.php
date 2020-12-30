<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Validator;

class Notifications extends Model
{
    //
    use Notifiable;
    protected $fillable = [
    	'id','title','content','status',
    ];

    public static function validator(array $data)
    {
    	return Validator::make($data, [
			'title' => ['required','string','max:255'],
            'content' => ['required', 'string', 'max:255'],
			'status' => ['required', 'int', 'max:255'],
			//'idstatus' => ['required', 'int','max:255'],
        ],
    	[
    		'required' => ':attribute không được để trống',
    		'string' => ':attribute khỉ được nhập chữ',
    		'int' => ':attribute chỉ được nhập số',
    	],
    	[
    		'title' => 'Tiêu đề',
    		'content' => 'Nội dung',
    		'status' => 'Trạng thái',
    	]);
    }
}
