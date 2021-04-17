<?php

namespace App\Http\Controllers;

use App\Chungsinh;
use Illuminate\Http\Request;
use Redirect;

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
        $chungsinhs = Chungsinh::all();
        return view('chungsinh.list',compact('chungsinhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('chungsinh.create');
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
            return Redirect::back();
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
    public function show(Chungsinh $chungsinh)
    {
        //
        return 'show chungsinh';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chungsinh  $chungsinh
     * @return \Illuminate\Http\Response
     */
    public function edit(Chungsinh $chungsinh)
    {
        //
        return view('chungsinh.edit',compact('chungsinh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chungsinh  $chungsinh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chungsinh $chungsinh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chungsinh  $chungsinh
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chungsinh $chungsinh)
    {
        //
        // dd($chungsinh);
        $chungsinh->delete();
    }
}
