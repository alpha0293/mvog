<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Chungsinh extends Model
{
    //
    protected $fillable = [
    	'tenthanh','tengoi','ho','ngaysinh','ngayvaodcv','giaoxu','idkhoa','profileimg',
    ];

    public static function validator(array $data)
    {
		//dd($data);
        return Validator::make($data, [
			'tenthanh' => ['required','string','max:255'],
            'tengoi' => ['required', 'string', 'max:255'],
            'ho' => ['required', 'string', 'max:255'],
			'ngaysinh' => ['required','date','after:01-01-1900','before:30-12-3000'],
			'ngayvaodcv' => ['required','date','after:01-01-1900','before:30-12-3000'],
			'giaoxu' => ['required', 'string', 'max:255'],
			'idkhoa' => ['required','string','max:255'],
        ],
    	[
    		'required' => ':attribute không được để trống',
    		'string' => ':attribute khỉ được nhập chữ',
    		'max' => ':attribute tối đa 255 kí tự',
    		'date' => ':attribute đúng định dạng ngày tháng',
    		'int' => ':attribute chỉ được nhập số',
    		'after' => ':attribute phải sau ngày 01/01/1900',
    		'before' => ':attribute phải trước ngày 31/12/3000',
            'min' => ':attribute tối thiếu 10 kí tự',
            'regex' => ':attribute không đúng định dạng',
    	],
    	[
    		'tenthanh' => 'Tên Thánh',
    		'tengoi' => 'Tên gọi',
    		'ho' => 'Họ đệm',
    		'ngaysinh' => 'Ngày sinh',
    		'ngayvaodcv' => 'Ngày vào ĐCV',
    		'giaoxu' => 'Giáo xứ',
            'idkhoa' => 'Khoá',
    	]);
    }
}
