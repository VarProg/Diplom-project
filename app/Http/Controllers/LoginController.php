<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class LoginController extends Controller
{
    private $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function auth(Request $request)
    {

        $this->user->auth($request);

        return redirect()->intended('/page_users')
                            ->withSuccess("Выполнен вход как {$request->email}");
        
    }

    public function logout(Request $request)
    {

        Session::flush();
        Auth::logout();

        return redirect('/page_login');
    }
}
