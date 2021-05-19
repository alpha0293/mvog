<?php

namespace App\Http\Controllers;

use App\Chungsinh;
use Illuminate\Http\Request;
use Redirect;
use App\Nienkhoa;

class ChungsinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nienkhoas = Nienkhoa::all();
        $chungsinhs = Chungsinh::all();
        return view('chungsinh.list',compact('chungsinhs','nienkhoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $nienkhoas = Nienkhoa::all();
        return view('chungsinh.create',compact('nienkhoas'));
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
        //dd($request->all());
        $arrName = explode(" ",$request->name);
        $request['tenthanh'] = array_shift($arrName);
        $request['tengoi'] = array_pop($arrName);
        $request['ho'] = implode(" ", $arrName);
        if (Chungsinh::validator($request->all())->fails()) {
            # code...
            return Redirect::back()->withErrors(Chungsinh::validator($request->all()));
        }
        try {

            Chungsinh::create($request->all());
            return Redirect::route('chungsinh.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chungsinh  $chungsinh
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $chungsinh;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chungsinh  $chungsinh
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $chungsinh = Chungsinh::findorfail($id);
        // return $chungsinh;
        return view('chungsinh.edit',compact('chungsinh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chungsinh  $chungsinh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // return gettype($request);
        // dd($request->all());
        $arrName = explode(" ",$request->name);
        $request['tenthanh'] = array_shift($arrName);
        $request['tengoi'] = array_pop($arrName);
        $request['ho'] = implode(" ", $arrName);
        if (Chungsinh::validator($request->all())->fails()) {
            # code...
            return Redirect::back()->withErrors(Chungsinh::validator($request->all()));
        }
        try {
            Chungsinh::where('id',$id)->update([
                'tenthanh' => $request->tenthanh,
                'tengoi' => $request->tengoi,
                'ho' => $request->ho,
                'ngaysinh' => $request->ngaysinh,
                'ngayvaodcv' => $request->ngayvaodcv,
                'giaoxu' => $request->giaoxu,
                'nienkhoa' => $request->nienkhoa,
                'khoa' => $request->khoa,
            ]);
            return Redirect::route('chungsinh.index')->with('message','Cập nhật thông tin chủng sinh thành công!!!');
        } catch (\Exception $e) {
            return Redirect::back()->with('message','Cập nhật thôg tin chủng sinh không thành công!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chungsinh  $chungsinh
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Chungsinh::where('id',$id)->delete();
            return Redirect::back()->with('message','Xoá chủng sinh(arg) thành công!!!');
        } catch (\Exception $e) {
            return Redirect::back()->with('message','Không xoá được chủng sinh(arg)!!!');
        }
    }
}
