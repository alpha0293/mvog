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
        $lstpost = Post::orderBy('id','DESC')->paginate(10);
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
        if (Post::validator($request->all())->fails()) {
                # code...
                return Post::validator($request->all());
        }
        else
        {
            try {
                $request['iduser'] = Auth::id();
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
        if ($post->status == 0)
        {
            if (Auth::check() && Auth::user()->hasRole('superadministrator|administrator'))
            {
                # code...
            }
            else
            {
                abort(404);
            }
            
            # code...
        }
        if(Post::all()->where('status',1)->count() > 5)
        {
            $postslide = Post::all()->where('status',1)->sortByDesc('created_at')->take(5);
            $lstpopularpost = Post::all()->where('status',1)->random(5);
        }
        else
        {
            $postslide = Post::all()->where('status',1);
            $lstpopularpost = $postslide;
        }
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
        if (Post::validator($request->all())->fails()) {
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

        try {
            Post::where('id',$id)->delete();
            return Redirect::back()->with('message','Xoá bài viết thành công!!!');
        } catch (\Exception $e) {
            return Redirect::back()->with('message','Không xoá được bài viết!!!');
        }
		
    }
    public function offpost(Request $request)
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
