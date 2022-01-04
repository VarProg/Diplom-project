<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    public function register(Request $request)
    {
        
        User::register($request);

        return redirect("page_login")->withSuccess('Регистрация успешна!');
    }

    
}












