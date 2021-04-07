<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\Link;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $links = Link::all();
        return view('link.list',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('link.create');
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
        if(Link::validator($request->all())->fails())
            return Redirect::back()->withErrors(Link::validator($request->all()));
        else{
            $request['status'] = 1;
            // return $request->all();
            try {
                Link::create($request->all());
                return redirect()->back()->with('success', 'Thêm thành công!');
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
        $link = Link::findorfail($id);
        return view('link.view',compact('link'));
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
        $link = Link::findorfail($id);
        return view('link.edit',compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if(Link::validator($request->all())->fails())
            return Redirect::back()->withErrors(Link::validator($request->all()));
        else
        {
            $link = Link::findorfail($request->id);
            try {
                $link->name = $request->name;
                $link->url = $request->url;
                $link->status = $request->status;
                $link->save();
                return redirect()->back()->with('success', 'Cập nhật thành công!');
            } catch (\Exception $e) {
                return Redirect::back()->withErrors("Cập nhật không thành công!");
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
        $link = Link::findorfail($id);
        try {
            $link->delete();
            return redirect()->back()->with('success', 'Xoá thành công!');
        } catch (\Exception $e) {
            return Redirect::back()->withErrors("Xoá không thành công!");
        }
    }
}
