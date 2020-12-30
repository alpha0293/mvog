<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Dutu;
use App\Post;
use App\Category;
// 
use Auth;
use Redirect;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstpost = Post::paginate(3);
        return view('post.list',compact('lstpost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstcategory = Category::all();
        return view('post.create',compact('lstcategory'));
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
        // return $request->all();
        if(Auth::user()->roleid != 1)
        {
            return Redirect::back()->with('message','Bạn không có quyền thực hiện hành động này!!!');
        }
        if (Post::validator($request->all())->fails()) {
                # code...
                return Post::validator($request->all());
        }
        else
        {
            try {
                Post::create($request->all());
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
		// $post = Post::get()->where('id',$id)->first();
        $post = Post::findOrFail($id);
       
        return view('post.view',compact('post'));
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
		$post = Post::findOrFail($id);
        $lstcategory = Category::all();
        // dd($post);
        return view('post.edit',compact('post','lstcategory'));
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
        // return $request->all();
        if(Auth::user()->roleid != 1)
        {
            return Redirect::back()->with('message','Bạn không có quyền thực hiện hành động này!!!');
        }
        if (Post::validator($request->all())->fails()) {
                # code...
                return Post::validator($request->all());
        }
        else
        {
            try {
                // Post::create($request->all());
                Post::where('id',$id)->update(
                    [
                        'thumbimg' => $request->thumbimg,
                        'title' => $request->title,
                        'content' => $request->content,
                        'status' => $request->status,
                        'idpost' => $request->idpost,
                    ]);
                return 'Update Thành công!!!';
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
        if(Auth::user()->roleid != 1)
        {
            return Redirect::back()->with('message','Bạn không có quyền thực hiện hành động này!!!');
        }
        else
        {
            try {
                Post::where('id',$id)->delete();
                return Redirect::back()->with('message','Xoá bài viết thành công!!!');
            } catch (\Exception $e) {
                return Redirect::back()->with('message','Không xoá được bài viết!!!');
            }
        }
		
    }
}
