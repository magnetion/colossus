<?php

namespace Magnetion\Colossus;

use View, Hash, Redirect, Session;

class LoginController extends \Illuminate\Routing\Controller
{

    public function __construct()
    {

    }


    public function login()
    {
        return view('Colossus::Login.login');
    }


    public function loginPost(\Magnetion\Colossus\Requests\LoginRequest $request)
    {
        $author = \Magnetion\Colossus\Models\Author::where('email', '=', trim($request->email))
            ->where('status', '=', 1)
            ->first();

        if($author && Hash::check(trim($request->password), $author->hash)) :
            Session::put('author_id', $author->id);
            return Redirect::to('/colossus/posts');
        else :
            return Redirect::to('/colossus/login')->withInput()->withErrors(['Invalid Login']);
        endif;
    }

}
