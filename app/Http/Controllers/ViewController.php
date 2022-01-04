<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;



class ViewController extends Controller
{
    private $user;

    function __construct(Request $request)
    {
        $this->user = User::find($request->id);
    }

    public static function page_register(){

        return view('page_register');

    }

    function page_login(){

        return view('page_login');
        
    }

    function page_users(){

        $users = User::simplePaginate(9);

        return view('users', ['usersInView' => $users]);
        
    }

    function page_edit(){

        return view('edit', ['userInView' => $this->user]);

    }

    function page_media(){

        return view('media', ['userInView' => $this->user]);
        
    }

    function page_profile(){

        return view('page_profile', ['userInView' => $this->user]);
        
    }

    function page_security(){

        return view('security', ['userInView' => $this->user]);
        
    }

    function page_status(){

        return view('status', ['userInView' => $this->user]);
        
    }

}
