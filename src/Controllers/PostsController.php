<?php

namespace Magnetion\Colossus;

use View, Hash, Redirect;

class PostsController extends \Illuminate\Routing\Controller
{

    public function __construct()
    {

    }


    public function list()
    {
        $posts = \Magnetion\Colossus\Models\Post::orderBy('publish_date', 'desc')->paginate(20);

        return view('Colossus::Posts.list', compact('posts'));
    }

}
