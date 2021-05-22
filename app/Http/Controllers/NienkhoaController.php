<?php

namespace App\Http\Controllers;

use App\Nienkhoa;
use Illuminate\Http\Request;
use Redirect;
class NienkhoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if (Nienkhoa::validator($request->all())->fails()) {
            return Redirect::back()->withErrors(Nienkhoa::validator($request->all()));
        }
        else
        {
            try {
                Nienkhoa::create(
                    [
                        'khoa' => $request->khoa,
                        'nienkhoa' => $request->nienkhoa,
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
     * @param  \App\Nienkhoa  $nienkhoa
     * @return \Illuminate\Http\Response
     */
    public function show(Nienkhoa $nienkhoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nienkhoa  $nienkhoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Nienkhoa $nienkhoa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nienkhoa  $nienkhoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nienkhoa $nienkhoa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nienkhoa  $nienkhoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nienkhoa $nienkhoa)
    {
        //
    }
}
