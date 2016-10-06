<?php

namespace Magnetion\Colossus;

use View, Hash, Redirect;

class PostsController extends \Illuminate\Routing\Controller
{

    public function __construct()
    {

    }


    public function listing()
    {
        $posts = \Magnetion\Colossus\Models\Post::orderBy('publish_date', 'desc')->paginate(20);

        return view('Colossus::Posts.list', compact('posts'));
    }


    public function edit($id=null)
    {
        if(is_null($id)) :
           $post = new \Magnetion\Colossus\Models\Post();
        else :

        endif;

        return view('Colossus::Posts.data', compact('post'));
    }

}
