<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegisterTest extends TestCase
{
    // use RefreshDatabase;
    


    public function testRegister()
    {

        $data = [
            'email' => Str::random(5) . 'mail.ru',
            'password' => Str::random(10)
        ];
        
        $response = User::create($data);

        $this->assertDatabaseHas('users_register', [
            'email' => $data['email'],
            'password' => $data['password']]);
    
    }

    public function testExample()
    {
        $response = $this->get('/page_login');

        $this->assertEquals(200, $response->status());      // Или assertOk(); Проверить статус просмотра страницы

        // dd($response->getContent());     // Получить контент страницы
    }

    // public function testAuth()
    // {
    //     $data = [
    //         'email' => Str::random(5) . 'mail.ru',
    //         'password' => Str::random(10)
    //     ];
    //     $user = User::create($data);

    //     // $auth = $this->post('/login', $data);

    //     $response = User::auth($data);
        

    //     $this->assertAuthenticated($guard = null);

    //     // $response = $this->get('/page_users');
    //     // $response->status();
    // }

    // public function testFailedEmailAuth()
    // {
    //     $this->post('/login', [
    //         'email' => 'Natali@gmail.ru',
    //         'password' => '123']);

    //     $response = $this->get('/page_users');
    //     $response->assertUnauthorized();
    // }
    
    // public function testFailedPasswordAuth()
    // {
    //     $this->post('/login', [
    //         'email' => 'Natali@mail.ru',
    //         'password' => '1234']);

    //     $response = $this->get('/page_users');
    //     $response->assertUnauthorized();
    // } 
    
    
    
}









