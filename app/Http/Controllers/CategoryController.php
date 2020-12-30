<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use App\Category;




class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstcat = Category::all();
        return view('category.list',compact('lstcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.create');
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
        if(Auth::user()->roleid != 1)
        {
            return Redirect::back()->with('message','Bạn không có quyền thực hiện hành động này!!!');
        }
        else
        {
            if(Category::validator($request->all())->fails())
                return Redirect::back()->withErrors(Category::validator($request->all()));
            else
            {
                try {
                    Category::create(
                        [
                            'name' => $request->name,
                            'status' => $request->status,
                        ]);
                    // return Paper::create(['name'=>$request->name,])->id;
                    return 'Thành công!!!';
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
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
        $cat = Category::findOrFail($id);
        return view('category.view',compact('cat'));
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
        if(Auth::user()->roleid != 1)
        {
            return Redirect::back()->with('message','Bạn không có quyền thực hiện hành động này!!!');
        }
        $cat = Category::findOrFail($id);
        return view('category.edit',compact('cat'));
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
        if(Auth::user()->roleid != 1)
        {
            return Redirect::back()->with('message','Bạn không có quyền thực hiện hành động này!!!');
        }
        else
        {
            if(Category::validator($request->all())->fails())
                return Redirect::back()->withErrors(Category::validator($request->all()));
            else
            {
                try {
                    Category::where('id',$id)->update(
                        [
                            'name' => $request->name,
                            'status' => $request->status,
                        ]);
                    // return Paper::create(['name'=>$request->name,])->id;
                    return 'Thành công!!!';
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
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
        //
        if(Auth::user()->roleid!=1)
        {
            return Redirect::back()->with('message','Bạn không có quyền thực hiện hành động này!!!');
        }
        try {
            Category::where('id',$id)->delete();
            return Redirect::back()->with('message','Xoá thành công');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
