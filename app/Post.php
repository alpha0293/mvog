<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Validator;

class Post extends Model
{
	use Notifiable;
    
	protected $fillable = [
        'id','thumbimg','title','content','status','idcategory','iduser',
    ];
    //
	public static function validator(array $data)
    {
		//dd($data);
        return Validator::make($data, [
            'thumbimg' => ['required','string'],
            'title' => ['required','string'],
			'content' => ['required','string'],
            'status' => ['required','int'],
            'idcategory' => ['required','int'],
        ],
        [
            'image' => ':attribute không hợp lệ',
            'required' => ':attribute không được để trống',
            'string' => ':attribute chỉ được nhập chữ, số',
            'int' => ':attribute chỉ được nhập số',
        ],
        [
            'thumbimg' => 'Ảnh nổi bật',
            'title' => 'Tiêu đề bài viết',
            'content' => 'Nội dung',
            'status' => 'Trạng thái',
            'idcategory' => 'Thể loại',
        ]);
    }	

    public function namecategory()
    {
        return $this->belongsTo('App\Category','idcategory','id');
    }
}
