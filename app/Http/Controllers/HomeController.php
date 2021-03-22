<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Post;
use App\Category;
use App\User;
use App\Role;
use App\Notifications;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->email_verified_at == null)
        {
            return redirect()->route('verification.notice');
        }
        if(Post::all()->count() == 0)
            return view('user.pagenull');
        $lstcat = Category::all()->where('status',1)->load(['getpost' => function($query){
                $query->where('status',1);
            }]);
        $lstcat2 = collect([]);
        $lstnoti = Notifications::all()->where('status',1)->sortByDesc('created_at');
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
        
        
        foreach($lstcat as $cat){
            if($cat->getpost->count()){
                $lstcat2->push($cat);
            }
        }
        $lstcat = $lstcat2;
        $i = 0;
        return view('user.home',compact('lstcat','i','lstnoti','postslide','lstpopularpost'));//
    }
}
