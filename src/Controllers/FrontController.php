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


    public function buildPage($slug)
    {
        $content = \Magnetion\Colossus\Models\Post::with('author', 'categories', 'comments')->where('slug', $slug)->first();

        if(count($content) > 0) :
            switch($content->post_type) {
                case 'post' :
                    return $this->buildPost($content);
                    break;
            }
        endif;
    }


    public function buildPost($post)
    {


        return View::make('post', compact('post'));
    }

}
