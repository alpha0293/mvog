<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Notifications;
use View;
use App\Post;
use App\Document;
use App\Link;
use App\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
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
        $link = Link::all()->where('status', 1);
        $document = Document::all();
        $lstcat = Category::all()->where('status', 1);
        View::share('lstnoti', $lstnoti);
        View::share('postslide',$postslide);
        View::share('lstpopularpost',$lstpopularpost);
        View::share('link', $link);
        View::share('document', $document);
        View::share('lstcat', $lstcat);

    }
}
