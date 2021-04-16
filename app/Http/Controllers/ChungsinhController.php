<?php

namespace App\Http\Controllers;

use App\Chungsinh;
use Illuminate\Http\Request;

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
    }
}
