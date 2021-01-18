<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Role;
use App\Status;
use App\Year;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
	
	//direct after regist
	protected function redirectTo()
    {
        if (Auth::user()->roleid==1) {
            return '/admin';
        }
        else
		{
			return '/dutu/create';
		}
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(Role::all()->count() == 0)
        {
            $role=array(
                [
                'id'=>'1',
                'name'=>'Admin'
                ],
                [
                'id'=>'2',
                'name'=>'Trưởng Nhóm'
                ],
                [
                'id'=>'3',
                'name'=>'Dự Tu'
                ]
                );
            foreach ($role as $ro) {
                # code...
                Role::create($ro);
            }
        }
        if(Status::all()->count() == 0)
        {
            $status=array(
                [
                'id'=>'1',
                'name'=>'Đang Sinh Hoạt'
                ],
                [
                'id'=>'2',
                'name'=>'Chờ xét duyệt'
                ]
                );
            foreach ($status as $sta) {
                # code...
                Status::create($sta);
            }
        }
        if(Year::all()->count() == 0)
        {
            $years=array(
                [
                'id'=>'1',
                'name'=>'Năm Nhất'
                ],
                [
                'id'=>'2',
                'name'=>'Năm Hai'
                ],
                [
                'id'=>'3',
                'name'=>'Năm Ba'
                ],
                [
                'id'=>'4',
                'name'=>'Dự Tu tự do'
                ]
                );
            foreach ($years as $year) {
                # code...
                Year::create($ro);
            }
        }



		if (User::all()->count()==0)
			$ro=1;
		else
			$ro=3;
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'roleid'=> $ro,
            'password' => Hash::make($data['password']),
        ]);
    }
}
