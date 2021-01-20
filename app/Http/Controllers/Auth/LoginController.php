<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Redirect;
use Auth;
use App\Dutu;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    //function direct affter login
    protected function redirectTo()
    {
		$id=Auth::user()->roleid;
        if (Auth::user()->roleid==1) {
            return '/admin';
        }
		else
		{
            $dutu = Dutu::all()->where('id',Auth::user()->id)->first();
            if($dutu == null)
            {
                return 'dutu/create';
            }
			else
			{
                if(($dutu->name == null) || ($dutu->holyname == null)|| ($dutu->dob == null) || ($dutu->parish == null) || ($dutu->school == null) || ($dutu->majors == null))
                {
                    return 'dutu/create';
                }
                else{
                    return '/';
                }
			}
			
		}
    }


    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
