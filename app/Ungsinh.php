<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Validation\Rule;
class Ungsinh extends Model
{
    protected $fillable = [
        'email','holyname','fullname','name','dob','parish','year',
    ];

    public static function validator(array $data)
    {
        // dd($data['year']);
        $year = $data['year'];
    	return Validator::make($data,[
    		'email' => "required|email|max:255|unique:ungsinhs,year,$year",
    		'holyname' => ['required','string','max:255'],
    		'fullname' => ['required','string','max:255'],
    		'name' => ['required','string','max:255'],
    		'dob' => ['required','date','after:01-01-1900','before:30-12-3000'],
    		'parish' => ['required','string','max:255'],
            'year' => ['required','int'],
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
            'email' => 'Email',
            'holyname' => 'Tên thánh',
            'fullname' => 'Tên họ',
    		'name' => 'Tên gọi',
    		'dob' => 'Ngày sinh',
    		'parish' => 'Giáo xứ',
            'year' => 'Năm dự thi',
    	]);
    }
}
