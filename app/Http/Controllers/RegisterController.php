<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserInfo;

class RegisterController extends Controller
{

    public function register(Request $request)
    {
        
        User::register($request);

        return redirect("page_login")->withSuccess('Регистрация успешна!');
    }

    
}












