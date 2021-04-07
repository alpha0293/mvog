<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Redirect;
use App\Zone;
use Auth;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstzone = Zone::all();
        return view('zone.list',compact('lstzone'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('zone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Zone::validator($request->all())->fails())
            return Redirect::back()->withErrors(Zone::validator($request->all()));
        else
        {
            try {
                Zone::create(
                    [
                        'name'=>$request->name,
                    ]);
                 return redirect()->back()->with('success', 'Tạo thành công!');
            } catch (\Exception $e) {
                return Redirect::back()->withErrors("Thêm không thành công!");
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
		$zone = Zone::findOrfail($id);
        return view('zone.view',compact('zone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$zone = Zone::findOrfail($id);
        return view('zone.edit',compact('zone'));
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
        if(Zone::validator($request->all())->fails())
            return Redirect::back()->with('message','Vui lòng điền đầy đủ các trường');
        else
        {
            try {
                Zone::where('id',$id)->update(
                    [
                        'name'=>$request->name,
                    ]);
                return 'Thành công!!!';
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
		Zone::where('id',$id)->delete();    
        return Redirect::back();
    }
}
