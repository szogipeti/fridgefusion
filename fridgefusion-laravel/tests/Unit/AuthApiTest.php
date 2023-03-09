<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function test_login()
    {
        $userdata = [
            "email" => "gastroworkshop@gmail.com",
            "password" => "1nimda"
        ];
        $response = $this->postJson('/api/login', $userdata);
        $response
            ->assertStatus(200)
            ->assertJsonPath('username', 'gastroworkshop');
    }

    public function test_invalid_login(){
        $userdata = [
            "email" => "gastroworkshop@gmail.com1",
            "password" => "1nimda"
        ];
        $response = $this->postJson('/api/login', $userdata);
        $response
            ->assertStatus(401)
            ->assertJsonPath('data.message', 'Unsuccessful login');
    }

    public function test_register(){
        $userdata = [
            "email" => "asdf123@gmail.com",
            "username" => "asdf123",
            "password" => "asdf123",
            "password_confirmation" => "asdf123"
        ];
        $response = $this->postJson('/api/register', $userdata);
        $response
            ->assertStatus(201)
            ->assertJsonPath('data.message', 'Successful registration!');
    }

    public function test_taken_email_register(){
        $userdata = [
            "email" => "gastroworkshop@gmail.com",
            "username" => "asdf123",
            "password" => "asdf123",
            "password_confirmation" => "asdf123"
        ];
        $response = $this->postJson('/api/register', $userdata);
        $response
            ->assertStatus(422)
            ->assertJsonPath('message', 'The email has already been taken.');
    }

    public function test_taken_username_register(){
        $userdata = [
            "email" => "asdf123@gmail.com",
            "username" => "gastroworkshop",
            "password" => "asdf123",
            "password_confirmation" => "asdf123"
        ];
        $response = $this->postJson('/api/register', $userdata);
        $response
            ->assertStatus(422)
            ->assertJsonPath('message', 'The username has already been taken.');
    }

    public function test_mismatching_password_register(){
        $userdata = [
            "email" => "asdf123@gmail.com",
            "username" => "asdf123",
            "password" => "asdf123",
            "password_confirmation" => "asdf1234"
        ];
        $response = $this->postJson('/api/register', $userdata);
        $response
            ->assertStatus(422)
            ->assertJsonPath('message', 'The password confirmation does not match. (and 1 more error)');
    }

    private function get_access_token()
    {
        $userdata = [
            "email" => "gastroworkshop@gmail.com",
            "password" => "1nimda"
        ];
        $response = $this->postJson('/api/login', $userdata);
        return json_decode($response->content())->token;
    }

    public function test_get_profile(){
        $headers = ['Authentication' => 'Bearer ' . $this->get_access_token()];
        $response = $this->getJson('/api/profile', $headers);
        $response
            ->assertStatus(200)
            ->assertJsonPath("username", 'gastroworkshop');
    }
}
