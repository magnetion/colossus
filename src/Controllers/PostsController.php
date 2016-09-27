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
        return view('Colossus::Posts.list');
    }

}
