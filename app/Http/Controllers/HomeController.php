<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Post;
use App\Category;
use App\User;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$all = User::all();
        //$all->toJson();
        // $lstpost = Post::paginate(3);
        $lstcat = Category::all()->load('getpost');
        $lstcat = $lstcat->takeWhile(function ($item) {
            return $item->getpost->count() >0;
        });
        // dd($lstcat);
        $i = 0;
        return view('user.home',compact('lstcat','i'));//
    }
}
