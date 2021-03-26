<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Redirect;



use App\Notifications;
use Auth;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstnoti = Notifications::all();
        return view('thongbao.list',compact('lstnoti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('thongbao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Notifications::validator($request->all())->fails()) {
            # code...
            return Redirect::back()->withErrors(Notifications::validator($request->all()));
        }
        else
        {
            // dd('Vo Auth');
            try {
                Notifications::create(
                    [
                        'title' => $request->title,
                        'content' => $request->content,
                        'status' => $request->status,
                    ]);
                return Redirect::back()->with('message','Tạo thành công Thông báo!!!');
            } catch (\Exception $e) {
                return Redirect::back()->with('message','Tạo không thành công!!!');
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
        $noti = Notifications::findOrfail($id);
        return view('thongbao.view',compact('noti'));
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
        $noti = Notifications::findOrfail($id);
        return view('thongbao.edit',compact('noti'));
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
        if(Notifications::validator($request->all())->fails())
            return Redirect::back()->with('message','Vui lòng điền đầy đủ các trường');
        else
        {
            try {
                Notifications::where('id',$id)->update(
                    [
                        'title' => $request->title,
                        'content' => $request->content,
                        'status' => $request->status,
                    ]);
                return 'Thanh Cong!';
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
        try {
            Notifications::where('id',$id)->delete();
            return Redirect::back()->with('message','Xoá thành công');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
