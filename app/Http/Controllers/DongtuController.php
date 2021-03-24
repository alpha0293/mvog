<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dongtu;

use Auth;
use Redirect;


class DongtuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstdongtu = Dongtu::all();
        return view('dongtu.list',compact('lstdongtu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return về form tạo mới dòng tu
		return view('dongtu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if (Dongtu::validator($request->all())->fails()) {
            # code...
            return Redirect::back()->withErrors(Dongtu::validator($request->all()));
        }
        else
        {
            try {
                Dongtu::create(
                    [
                        'name' => $request->name,
                        'information' => $request->information,
                    ]);
                return Redirect::back()->with('message','Tạo thành công dòng tu!!!');
            } catch (\Exception $e) {
                return Redirect::back()->with('message','Tạo không thành công!!!');
            }
        }
        //
		
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
		$dongtu = Dongtu::findOrfail($id);
        return view('dongtu.view',compact('dongtu'));
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
		$dongtu = Dongtu::findOrfail($id);
        return view('dongtu.edit',compact('dongtu'));
		// return view
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
        if (Dongtu::validator($request->all())->fails()) {
            # code...
            return Redirect::back()->withErrors(Dongtu::validator($request->all()));
        }
        else
        {
            try {
                Dongtu::where('id',$id)->update(
                    [
                        'name' => $request->name,
                        'information' => $request->information,
                    ]);
                return Redirect::back()->with('message','Cập nhật thành công dòng tu!!!');
            } catch (\Exception $e) {
                return Redirect::back()->with('message','Cập nhật không thành công!!!');
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
            Dongtu::where('id',$id)->delete();
            return Redirect::back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }	
    }
}
