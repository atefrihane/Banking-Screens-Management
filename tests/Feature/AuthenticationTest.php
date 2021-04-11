<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Modules\User\Models\User;
use Database\Factories\RoleFactory;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
   
   
    public function testShowLogin()
    {

        $response = $this->get('/login');
        $response->assertSeeText('Login');

    }
    public function testHandleAddRole()
    {
        $role = RoleFactory::new()->create();
        $this->assertDatabaseHas('roles', [
            'name'       => $role->name,

        ]);
    }

    public function testHandleLogin()
    {
        
        $user = UserFactory::new()->create();
        $response = $this->post('/login' , [
            'email' => $user->email,
            'password' => '123456'
        ]);
        $response->assertRedirect('/');
         
        $this->assertTrue(Auth::check());
    }

    public function testLogout()
    {
        $response = $this->get('/logout');
        $response->assertRedirect('/login');
        $this->assertFalse(Auth::check());
    }
}
