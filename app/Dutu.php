<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Validator;

class Dutu extends Model
{
	use Notifiable;
	
	protected $fillable = [

        'id','profileimg','name','holyname','dob','school','majors','parish','idzone','idyear','idstatus','check',

    ];
    //
	/**
     * Get the Zone for the Dutu.
     */
    public function namezone()
    {
        return $this->belongsTo('App\Zone','idzone','id');
    }
	
	//get the Year for Dutu
	public function nameyear()
	{
		return $this->belongsTo('App\Year','idyear','id');
	}
	//get the status for Dutu
	public function namestatus()
	{
		return $this->belongsTo('App\Status','idstatus','id');
	}
	
	//get diem danh for dutu
	public function getattend()
	{
		return $this->hasMany('App\Attendance','iddutu','id');
	}

	//get
	public function getattend2(string $year)
	{
		return $this->hasMany('App\Attendance','iddutu','id')->where('year',$year);
	}
	


	public static function validator(array $data)
    {
		//dd($data);
        return Validator::make($data, [

        	// 'profileimg' => ['image'],

        	//'profileimg' => ['image'],

			'holyname' => ['required','string','max:255'],
            'name' => ['required', 'string', 'max:255'],
			'dob' => ['required','date','after:01-01-1900','before:30-12-3000'],
			'parish' => ['required', 'string', 'max:255'],
			'school' => ['required','string','max:255'],
			'majors' => ['required','string','max:255'],
			'idzone' => ['required', 'int', 'max:255'],
			'idyear' => ['required', 'int', 'max:255'],

			//'idstatus' => ['required', 'int','max:255'],
        ],
    	[
    		'image' => ':attribute không hợp lệ',

			'idstatus' => ['required', 'int','max:255'],
            'email' => ['required', 'string','max:255'],
        ],
    	[
    		//'image' => ':attribute không hợp lệ',

    		'required' => ':attribute không được để trống',
    		'string' => ':attribute khỉ được nhập chữ',
    		'max' => ':attribute tối đa 255 kí tự',
    		'date' => ':attribute đúng định dạng ngày tháng',
    		'int' => ':attribute chỉ được nhập số',
    		'after' => ':attribute phải sau ngày 01/01/1900',
    		'before' => ':attribute phải trước ngày 31/12/3000',
    	],
    	[

    		'profileimg' => 'Ảnh',
    		'holyname' => 'Tên Thánh',
    		'name' => 'Tên gọi',
    		'dob' => 'Ngày sinh',
    		'parish' => 'Giáo xứ',
    		'school' => 'Trường học',
    		'majors' => 'Chuyên ngành',

            'email' => 'Email',

    	]);
    }	
}
