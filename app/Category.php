<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Validator;

class Category extends Model
{
    //
    use Notifiable;
    protected $fillable = [
        'name','status',
    ];

    public function getpost()
    {
    	return $this->hasMany('App\Post','idcategory','id');
    }

    public static function validator(array $data)
    {
        // dd($data);
    	return Validator::make($data,[
    		'name' => ['required','string'],
            'status' => ['required','int'],
    	],
    	[
    		'required' => ':attribute không được để trống',
    		'string' => ':attribute chỉ được nhập kí tự',
            'int' => ':attribute chỉ được nhập số',
    	],
    	[
    		'name' => 'Tên',
            'status' => 'Tình Trạng',
    	]);
    }
}
