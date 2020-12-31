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
        $lstcat = Category::all()->load('getpost');
        $lstcat2 = collect([]);
        foreach($lstcat as $cat){
            if($cat->getpost->count()){
                $lstcat2->push($cat);
            }
        }
        $lstcat = $lstcat2;
        $i = 0;
        return view('user.home',compact('lstcat','i'));//
    }
}
