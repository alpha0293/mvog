<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Dutu;

use App\User;
use App\Zone;
use App\Year;
use App\Role;
use App\Paper;

use Auth;
use Redirect;

use File;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;

class DutuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$dutu = Dutu::all();
    	return $dutu;
		return ('Đây là trang view dự tu');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
    	//dd();
		$id= Auth::user()->id;
		$email = Auth::user()->email;
		$name = Auth::user()->name;
		$zone = Zone::all();
		$year = Year::all();
		if(Dutu::all()->where('id',$id)->count()==1)
		{
			return redirect()->route('show.dutu',$id);
		}
		else
		{
			return view('auth.create',compact('email','name','year','zone'));
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->idstatus=2;
		if(Dutu::validator($request->all())->fails())
		{
			//dd(Dutu::validator($request->all())->errors());
			$vali=Dutu::validator($request->all());
			// dd($vali->errors());
			return Redirect::back()->withErrors($vali);
		}
		else
		{
			$arrName = explode(" ",$request->name);
			$firstName = array_shift($arrName);
			$lastName = array_pop($arrName);
			$middleName = implode(" ", $arrName);
			try{
				Dutu::create(
				['id' => Auth::id(),
				'holyname'=>$request->holyname,
				'name'=>$lastName,
				'fullname'=>$firstName.' '.$middleName,
				'dob'=>$request->dob,
				'phonenumber'=>'0987654321',
				'parish'=>$request->parish,
				'school'=>$request->school,
				'majors'=>$request->majors,
				'idzone'=>$request->idzone,
				'idyear'=>$request->idyear,
				'idstatus'=>$request->idstatus,
				'check' => 0,
				]);
				return redirect()->route('home')->with('message','Đăng kí thành công!!!');
			}
			catch(\Exception $e)
			{
				return Redirect::back()->withErrors($e->getMessage());
			}
		}	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

		if($id != Auth::id() && Auth::user()->hasRole('dutu'))
		{
			abort (403);
		}
		$user = Auth::user();
		$dutu = Dutu::findOrFail($id);
		$zone = Zone::all();
		$year = Year::all();
		$lstpaper = Paper::all();
		return view('user.info',compact('dutu','user','zone','year','lstpaper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		if($id != Auth::id() && !Auth::user()->hasRole('superadministrator|administrator'))

		{
			abort (403);
		}
		$year = Year::all();
		$zone = Zone::all();
		$user = Auth::user();
		$dutu = Dutu::findOrFail($id);
		return view('auth.update_info',compact('dutu','user','zone','year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

		//
		// return $request->all();
		if($id != Auth::id() && Auth::user()->hasRole('dutu|nhomtruong'))
		{
			abort (403);
		}
		$user = Auth::user();
		$dutu = Dutu::findOrFail($id);
		if(Auth::user()->hasRole('superadministrator|administrator'))
		{
			if($request->idstatus=="on")
			{
				$request['idstatus'] = 1;
			}
			else
			{
				$request['idstatus'] = 2;
			}
			
		}
		if(Auth::user()->hasRole('nhomtruong'))
		{
			$request['idstatus'] = $dutu->idstatus;
			$request['idyear'] = $dutu->idyear;
			$request['idzone'] = $dutu->idzone;
		}
		if(Auth::user()->hasRole('dutu'))
		{
			$request['idstatus'] = $dutu->idstatus;
			$request['idyear'] = $dutu->idyear;
		}
		$vali = Dutu::validator($request->all());
		 if($vali->fails())
		 {
		 	return $vali->errors();
		 }
		 else
		{
			if($request->profileimg=="")
			{
				$imagename = $dutu->profileimg;
				
			}
			else
			{
				$valid_img = Validator::make($request->all(),[
						'profileimg' =>'image',
					],
					[
						'image' => ':attribute không hợp lệ',
					],
					[
						'profileimg' => 'Ảnh đại diện',
					]);
				if ($valid_img->fails()) {
					return $valid_img->errors();
				}

				$imagename = time().'.'.request()->profileimg->getClientOriginalExtension();
	            $request['profileimg'] = $imagename;
	          	try {
	          		request()->profileimg->move(public_path('file\profileimg'), $imagename);
	          		$path = public_path().'/file/profileimg/'.$dutu->profileimg;	
	          		File::delete($path);
	          	} catch (\Exception $e) {
	          		return "Lỗi move ảnh";
	          	}
			}
			try
			{
				$arrName = explode(" ",$request->name);
				$firstName = array_shift($arrName);
				$lastName = array_pop($arrName);
				$middleName = implode(" ", $arrName);
				Dutu::where('id',$id)->update(
					['holyname'=>$request->holyname,
					'profileimg'=> $imagename,
					'name'=>$lastName,
					'fullname'=>$firstName.' '.$middleName,
					'dob'=>$request->dob,
					'phonenumber'=>$request->phonenumber,
					'parish'=>$request->parish,
					'school'=>$request->school,
					'majors'=>$request->majors,
					'idzone'=>$request->idzone,
					'idyear'=>$request->idyear,
					'idstatus'=>$request->idstatus,
					]);
				User::where('id',$id)->update(['email'=>$request->email]);
				return 'success';
			} catch (\Exception $e) {
				return $e->getMessage();
			}
		}
		
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        
        $user = User::findOrFail($id);
        if($user->hasRole('nhomtruong'))
        {
        	return Redirect::back()->with('message','Bạn không thể xoá trưởng nhóm!!!');
        }
        try {
        	Dutu::where('id',$id)->delete();
        	return Redirect::back()->with('message','Xoá thành công!!!');
        } catch (Exception $e) {
        	return Redirect::back()->with('message','Đã có lỗi xảy ra!!!');
        }
    }
}
