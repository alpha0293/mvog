<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Redirect;
use App\Paper;
use Auth;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstpaper = Paper::all();
        return view('paper.list',compact('lstpaper'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return form tao moi paper
        return view('paper.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Paper::validator($request->all())->fails())
            return Redirect::back()->withErrors(Paper::validator($request->all()));
        else
        {
            try {
                Paper::create(
                    ['name'=>$request->name,
                    'url'=>$request->url,
                    ]);
                // return Paper::create(['name'=>$request->name,])->id;
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

		$paper = Paper::findOrFail($id);
        return view ('paper.view',compact('paper'));
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
        return $id;
		$paper = Paper::findOrFail($id);
        return view('paper.edit',compact('paper'));
		//return trang edit paper
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
        if(Paper::validator($request->all())->fails())
            return Redirect::back()->with('message','Vui lòng điền đầy đủ các trường');
        else
        {
            try {
                Paper::where('id',$request->id)->update(
                    [
                        'name'=>$request->name,
                        'url'=>$request->url,
                    ]);
                return redirect()->back()->with('success', 'Tạo thành công!');
            } catch (\Exception $e) {
                return Redirect::back()->withErrors("Thêm không thành công!");
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
            Paper::where('id',$id)->delete();
            return Redirect::back()->with('message','Xoá thành công');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
