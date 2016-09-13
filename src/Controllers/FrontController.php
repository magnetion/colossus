<?php

namespace Magnetion\Colossus;

class FrontController extends \Illuminate\Routing\Controller
{

    public function __construct()
    {

    }


    public function buildHomepage()
    {
        $posts = \Magnetion\Colossus\Models\Post::where('status', 1)->orderBy('publish_date', 'desc')->paginate(10);
dd($posts);
        return view('home');
    }

}
