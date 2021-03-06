<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{

    private $admin;

    function __construct(User $admin)
    {
        $this->middleware('admin');
        $this->admin = $admin;
    }

    public function page_create_user(){

        return view('create_user');

    }

    public function create_user(Request $request)
    {

        $this->admin->add_user($request);

        return redirect('/page_users')->withSuccess("Добавлен пользователь {$request->email}");

    }

}










