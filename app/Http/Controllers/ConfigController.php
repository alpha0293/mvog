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
        //
        $config = Config::all();
        // return $config;
        return view('admin.config-manager.config',compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->roleid != 1)
        {
            return Redirect::back()->with('message','Bạn không có quyền thực hiện hành động này!!!');
        }
        else
        {
            if(Config::validator($request->all())->fails())
            {
                // return Config::validator($request->all())->errors();
                return Redirect::back()->withErrors(Config::validator($request->all()));
            }
                
            else
            {
                $config = Config::all()->first();
                // return $config;
                if($config) //update cấu hình ở đây
                {
                    try {
                        Config::all()->first()->update(
                            $request->all()
                        );
                        return Redirect::back()->with('message','Update thành công!');
                    } catch (Exception $e) {
                        return Redirect::back()->withErrors('Update không thành công!');
                    }
                }
                else //chưa có cấu hình thì insert
                {
                    try {
                        Config::create(
                            $request->all()
                        );
                        return Redirect::back()->with('message','Thêm mới cấu hình thành công!');
                    } catch (Exception $e) {
                        return Redirect::back()->withErrors('Thêm không thành công!');
                    }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
