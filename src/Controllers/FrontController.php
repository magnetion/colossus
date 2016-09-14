<?php

namespace Magnetion\Colossus;

use View;

class FrontController extends \Illuminate\Routing\Controller
{

    public function __construct()
    {

    }


    public function buildHomepage()
    {
        $posts = \Magnetion\Colossus\Models\Post::with('author', 'categories')->where('status', 1)->orderBy('publish_date', 'desc')->paginate(10);

        return View::make('home', compact('posts'));
    }

}
