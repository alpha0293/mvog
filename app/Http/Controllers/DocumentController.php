<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\Document;
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $document = Document::all();
        return view('document.list',compact('document'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('document.create');
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
        if(Document::validator($request->all())->fails())
            return Redirect::back()->withErrors(Document::validator($request->all()));
        else
        {
            try {
                Document::create($request->all());
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
        $document = Document::findorfail($id);
        return view('document.view',compact('document'));
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
        $document = Document::findorfail($id);
        return view('document.edit',compact('document'));
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
        if(Category::validator($request->all())->fails())
            return Redirect::back()->withErrors(Category::validator($request->all()));
        else
        {
            $document = Document::findorfail($request->id);
            try {
                $document->name = $request->name;
                $document->url = $request->url;
                $document->save();
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
        $document = Document::findorfail($id);
        try {
            $document->delete();
            return redirect()->back()->with('success', 'Xoá thành công!');
        } catch (\Exception $e) {
            return Redirect::back()->withErrors("Xoá không thành công!");
        }
    }
}
