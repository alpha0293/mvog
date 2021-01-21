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
    	$dutu = Dutu::first();
    	dd($dutu->getattend2('2018')->first());
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
		$role = Auth::user()->roleid;
		$zone = Zone::all();
		$year = Year::all();

		if($role==1)
		{
			//dd('Vào đây làm gì, hãy để dự tu tự tạo dự tu!!!');
			return Redirect::back()->with('message','Bạn không tạo mới được dự tu!!!');
		}
		else
		{
			if(Dutu::all()->where('id',$id)->count()==1)
			{
				return redirect()->route('show.dutu',$id);
			}
			else
			{
				return view('auth.create',compact('email','name','year','zone'));
			}
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
      if(Auth::user()->roleid==1)
		{
			dd('Không tạo mới được Dự tu');
		}
		else
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
				try{
					Dutu::create(
					['id' => Auth::id(),
					'holyname'=>$request->holyname,
					'name'=>$request->name,
					'dob'=>$request->dob,
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
					dd($e->getMessage());
					return Redirect::back()->withErrors($e->getMessage());
					dd(($e->getMessage()));
				}
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

		if($id!=Auth::id() && Auth::user()->roleid != 1)
		{
			return Redirect::back()->with('message','Bạn không có quyền xem thông tin của người dùng khác!!!');
		}
		$user=Auth::user();
		$dutu=Dutu::get()->where('id',$id)->first();
		$zone = Zone::all();
		$year = Year::all();

		if(is_null($dutu))
		{
			return 'Không có thông tin dự tu này trong cơ sở dữ liệu';
		}

		return view('user.info',compact('dutu','user','zone','year'));

		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

		if($id!=Auth::id() && Auth::user()->roleid != 1)

		{
			return Redirect::back()->with('message','Bạn không có quyền Sửa thông tin!!!');
		}
		$role = Auth::user()->roleid;
		$year = Year::all();
		$zone = Zone::all();
		if($role==1)
		{
			return Redirect::back();
		}
		$user=Auth::user();
		$dutu=Dutu::all()->where('id',$id)->first();
		if(is_null($dutu))
		{
			return redirect()->route('home');
		}
		else{
			return view('auth.update_info',compact('dutu','user','zone','year'));
		}
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
		// return $request->profileimg;
		if($id!=Auth::id() && Auth::user()->roleid != 1)
		{
			return Redirect::back()->with('message','Bạn không có quyền Sửa thông tin!!!');
		}
		$user=Auth::user();
		$dutu=Dutu::get()->where('id',$id)->first();


		if(Auth::user()->roleid==1)
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
		else
		{
			$request->idstatus = $dutu->idstatus;;		
		}	
		// if($request->profileimg=="")
		// {
		// 	// return "NULL";
		// 	$request['profileimg'] = $dutu->profileimg;
		// }

		$vali = Dutu::validator($request->all());
		// return $vali;
		 if($vali->fails())
		 {
		 	return "vali"; //$vali->message();
		   //return Redirect::back()->withErrors($vali);
		 }
		 else
		{
			if($request->profileimg=="")
			{
				$imagename = $dutu->profileimg;
				
			}
			else
			{
				$validatedData = $request->validate([
			        'profileimg' => 'image',
			    ]);

				$imagename = time().'.'.request()->profileimg->getClientOriginalExtension();
	            $request['profileimg'] = $imagename;
	          	try {
	          		request()->profileimg->move(public_path('file\profileimg'), $imagename);
	          		$path = public_path().'/file/profileimg/'.$dutu->profileimg;
	          		// return $path;	
	          		File::delete($path);
	          	} catch (\Exception $e) {
	          		return "Lỗi move ảnh";
	          	}
			}
			try {
				Dutu::where('id',$id)->update(
					['holyname'=>$request->holyname,
					'profileimg'=> $imagename,
					'name'=>$request->name,
					'dob'=>$request->dob,
					'parish'=>$request->parish,
					'school'=>$request->school,
					'majors'=>$request->majors,
					'idzone'=>$request->idzone,
					'idyear'=>$request->idyear,
					'idstatus'=>$request->idstatus,
					]);
					return "Thành công nhân";
					return redirect()->route('home')->with('message','Cập nhật thông tin thành công!!!');

			} catch (\Exception $e) {
				return 'error';
				dd($e->getMessage());
				return Redirect::back();
			}


			/*Dutu::where('id',$id)->update(
			['holyname'=>$request->holyname,
			'name'=>$request->name,
			'dob'=>$request->dob,
			'parish'=>$request->parish,
			'school'=>$request->school,
			'majors'=>$request->majors,
			'idzone'=>$request->idzone,
			'idyear'=>$request->idyear,
			'idstatus'=>$request->idstatus,
			]);
			return redirect()->route('home');
			*/
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
        
        if(Auth::user()->roleid != 1)
        {
        	return Redirect::back()->with('message','Bạn không có quyền thực hiện hành động này!!!');
        }
        $user=User::all()->where('id',$id);
        if($user->first()->roleid == 2)
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
