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
    use RefreshDatabase;
    
    public function testRegister()
    {
        
        $user = User::factory()->create();

        $this->assertDatabaseHas('users_register', [
            'email' => $user->email,
            'name' => $user->name]);
    
    }

    public function testAddUser()
    {
        $user = User::factory()->create();
        
        $this->assertDatabaseHas('users_register', [
            'email'     => $user->email,
            'name'      => $user->name,
            'job'       => $user->job,
            'phone'     => $user->phone,
            'adress'    => $user->adress,
            'status'    => $user->status,
            'image'     => $user->image,
            'vk'        => $user->vk,
            'telegram'  => $user->telegram,
            'instagram' => $user->instagram
        ]);
    }

    
    
    
}









