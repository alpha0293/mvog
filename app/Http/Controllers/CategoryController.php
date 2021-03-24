<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use App\Category;
use App\Post;
use App\Notifications;



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
        $request['status'] = 1;
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
                return redirect()->back()->with('success', 'Your message has been sent successfully!');
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

        $cat = Category::findOrFail($id);
        $lstpost = Post::where('idcategory',$id)->where('status',1)->paginate(10);
        $lstcat = Category::all()->where('status',1);
        $lstnoti = Notifications::all()->where('status',1)->sortByDesc('created_at');
        $postslide = Post::all()->where('status',1)->sortByDesc('created_at')->take(5);
        $lstpopularpost = Post::all()->where('status',1)->random(5);
        return view('category.view',compact('cat','lstpost','lstnoti','lstpopularpost','lstcat','postslide'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            Category::where('id',$id)->delete();
            return Redirect::back()->with('message','Xoá thành công');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function offcat(Request $request)
    {
        //
        // return $request->all();
        if($request->value == 'true')
            $status = 1;
        else
            $status = 0;
        try {
            Category::where('id',$request->catid)->update(['status'=> $status]);
            return 'thanh cong!!';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
