<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $table = 'users_register';

    public function isAdmin()
    {
        if (Auth::user()->role == 0) {
            return true;
        }
    }

    public static function register(Request $request)
    {
        
        $request->validate([
            'email'         => 'required|email|unique:users_register',
            'password'      => 'required|min:3',
        ]);

        User::create([
            'email'         => $request->email,
            'password'      => Hash::make($request->password)
        ]);

    }

    public static function add_user(Request $request)
    {
        $request->validate([
            'email'         => 'required|email|unique:users_register',
            'password'      => 'required|min:3',
        ]);

        User::create([
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'name'          => $request->name,
            'job'           => $request->job,
            'phone'         => $request->phone,
            'adress'        => $request->adress,
            'status'        => $request->status,
            'image'         => $request->file('image')->store('uploads'),
            'vk'            => $request->vk,
            'telegram'      => $request->telegram,
            'instagram'     => $request->instagram,
        ]);

    }

    public static function auth(Request $request)
    {
        $credentials = $request->validate([
            'email'         => ['required', 'email'],
            'password'      => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            
            return redirect("/page_login")->withWarning('???????????????? ?????????? ?????? ????????????!');
        }

        $request->session()->regenerate();
    }

    public static function edit_info(Request $request)
    {

        return User::find($request->id)->updateOrInsert(
                        ['id'      => $request->id],
                        ['name'         => $request->name,
                        'job'           => $request->job ?? '',
                        'phone'         => $request->phone ?? '',
                        'adress'        => $request->adress ?? '',
        ]);

    }

    public static function edit_credentials(Request $request)
    {
        return User::find($request->id)->update([
                        'email'         => $request->email,
                        'password'      => bcrypt($request->password)
        ]);

    }

    public static function media(Request $request)
    {
        $deleteImage = User::find($request->id)->image;

            if(!empty($deleteImage)){
                Storage::delete($deleteImage);
            }

        return User::find($request->id)->updateOrInsert(
                        ['id'      => $request->id],
                        ['image'        => $request->file('image')->store('uploads')
        ]);

    }

    public static function status(Request $request)
    {
        return User::find($request->id)->updateOrInsert(
                        ['id'      => $request->id],
                        ['status'       => $request->status
        ]);

    }
    
    public static function delete_user(Request $request)
    {
        return User::find($request->id)->delete();

    }
}










