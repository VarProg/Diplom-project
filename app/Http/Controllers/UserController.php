<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;



class UserController extends Controller
{
     private $user;

     function __construct(User $user, Request $request)
     {
          $this->middleware('auth');
          $this->user = $user;
     }

     protected function edit_user_info(Request $request)
     {
          Gate::authorize('update-user-info', [$request->id]);

          $this->user->edit_info($request);

          return redirect('/page_users')->withSuccess('Профиль успешно обновлен!');
     }

     protected function edit_security_info(Request $request)
     {

          Gate::authorize('update-user-security-info', [$request->id]);

          $this->user->edit_credentials($request);

          return redirect('/page_users')->withSuccess('Профиль успешно обновлен!');

     }

     protected function set_media(Request $request)
     {
          Gate::authorize('update-user-info', [$request->id]);

          $this->user->media($request);

          return redirect('/page_users')->withSuccess('Аватар успешно изменен!');
     }

     protected function set_online_status(Request $request)
     {
          Gate::authorize('update-user-info', [$request->id]);

          $this->user->status($request);

          return redirect('/page_users')->withSuccess("Статус изменен на {$request->status}");
     }

     protected function delete_user(Request $request)
     {
          Gate::authorize('update-user-security-info', [$request->id]);

          $this->user->delete_user($request);

          return redirect('/page_users')->withSuccess('Пользователь удален');
     }
   
}
