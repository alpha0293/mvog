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
            return Redirect::back()->with('message','Vui lòng điền đầy đủ các trường');
        else
        {
            try {
                Paper::create(
                    ['name'=>$request->name,
                    ]);
                // return Paper::create(['name'=>$request->name,])->id;
                return 'Thành công!!!';
            } catch (\Exception $e) {
                return $e->getMessage();
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
                Paper::where('id',$id)->update(
                    [
                        'name'=>$request->name,
                        'url'=>$request->url,
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
            Paper::where('id',$id)->delete();
            return Redirect::back()->with('message','Xoá thành công');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
