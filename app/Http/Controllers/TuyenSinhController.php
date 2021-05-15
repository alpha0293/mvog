<?php

namespace App\Http\Controllers;

use App\TuyenSinh;
use Illuminate\Http\Request;

class TuyenSinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tuyensinhs = TuyenSinh::all()->where('year',now()->year);
        // return $tuyensinhs;
        return view('tuyensinh.list',compact('tuyensinhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tuyensinh.create');
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
     * @param  \App\TuyenSinh  $tuyenSinh
     * @return \Illuminate\Http\Response
     */
    public function show(TuyenSinh $tuyenSinh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TuyenSinh  $tuyenSinh
     * @return \Illuminate\Http\Response
     */
    public function edit(TuyenSinh $tuyenSinh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TuyenSinh  $tuyenSinh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TuyenSinh $tuyenSinh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TuyenSinh  $tuyenSinh
     * @return \Illuminate\Http\Response
     */
    public function destroy(TuyenSinh $tuyenSinh)
    {
        //
    }
}
