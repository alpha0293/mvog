<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Dutu;
use App\Post;
use App\Category;
use App\Notifications;
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
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        $lstpost = Post::paginate(10);
        return view('post.list',compact('lstpost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
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
        $postslide = Post::all()->where('status',1)->sortByDesc('created_at')->take(5);
        $lstpopularpost = Post::all()->where('status',1)->random(5); //post ngẫu nhiên
        $lstnoti = Notifications::all()->where('status',1)->sortByDesc('created_at');
        $lstcat = Category::all()->where('status',1);
        $lstrelatedpost = Post::all()->where('status',1)->where('idcategory',$post->idcategory)->sortByDesc('created_at')->take(3);
        return view('post.show',compact('post','postslide','lstnoti','lstpopularpost','lstcat','lstrelatedpost'));
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
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
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
                        'idcategory' => $request->idcategory,
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
    public function offpost(Request $request)
    {
        //
        // return $request->value == true ? 1 : 0;
        if(Auth::user()->roleid != 1)
        {
            return Redirect::back()->with('message','Bạn không có quyền thực hiện hành động này!!!');
        }
        else
        {
            if($request->value == 'true')
                $status = 1;
            else
                $status = 0;
            try {
                Post::where('id',$request->postid)->update(['status'=> $status]);
                return 'thanh cong!!';
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        
    }
}
