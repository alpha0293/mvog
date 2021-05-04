<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Validator;

class Attendance extends Model
{
	use Notifiable;
	protected $fillable = [
        'iddutu','month','year','status','note','iduser',
    ];
	
	
	//get the attend for dutu
	public function attend()
    {
        return $this->belongsTo('App\Dutu','iddutu','id');
    }
	
    //

    public static function validator(array $data)
    {
		//dd($data);
        return Validator::make($data, [
			'iddutu' => ['required','int'],
            'month' => ['required', 'string', 'max:255'],
			'year' => ['required', 'string', 'max:255'],
			'status' => ['required','boolean'],
			'note' => ['string','max:255'],
			//'idstatus' => ['required', 'int','max:255'],
        ]);
    }	
}
