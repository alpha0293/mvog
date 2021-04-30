<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use App\Config;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.config-manager.config');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Config::validator($request->all())->fails())
        {
            return Redirect::back()->withErrors(Config::validator($request->all()));
        }
            
        else
        {

            \Setting::set('config.title', $request->input('title'));
            \Setting::set('config.loichua', $request->input('loichua'));
            \Setting::set('config.timediemdanhlai', $request->input('timediemdanhlai'));
            \Setting::set('config.tilevang', $request->input('tilevang'));
            \Setting::set('config.diemxetquanam', $request->input('diemxetquanam'));
            \Setting::set('config.tuoithidcv', $request->input('tuoithidcv'));
            \Setting::set('config.logo', $request->input('logo'));
            \Setting::set('config.banner', $request->input('banner'));
            \Setting::set('config.footer', $request->input('footer'));
            \Setting::set('config.backgroundcolor', $request->input('backgroundcolor'));
            \Setting::set('config.barcolor', $request->input('barcolor'));
            try{
                \Setting::save();
                \Log::info('Người dùng ID:'.Auth::user()->id.' đã cập nhật thông tin công ty');
                return Redirect::back()->with('message','Update thành công!');
            }
            catch(\Exception $e){
                \Log::error($e);
                return Redirect::back()->withErrors('Update không thành công!');
            }
        }
    }
}
