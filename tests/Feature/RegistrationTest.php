<?php

namespace Tests\Feature;

use App\Models\Roles;
use App\Models\User;
use Database\Seeders\RolesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed([RolesSeeder::class]);
    }

    /**
     * With valid data
     */
    public function test_register_user_with_valid_data(): void
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe2@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role_id' => Roles::where('name', 'user')->first()->id,
        ];

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->postJson('api/register', $data);

        $response->assertStatus(201)
            ->assertJson(['message' => 'User registered successfully',])
            ->assertJsonStructure(['status', 'message', 'data' => ['token']]);

        $this->assertDatabaseHas('users', [
            'email' => 'john.doe2@gmail.com',
        ]);
    }

    public function test_register_user_with_invalid_data(): void
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe2@gmail.com',
            'password' => 'password',
        ];

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->postJson('api/register', $data);

        $response->assertStatus(422)
            ->assertJson(['message' => 'The password field confirmation does not match.'])
            ->assertJsonStructure(['status', 'message', 'data' => ['password']]);

        $this->assertDatabaseMissing('users', [
            'email' => 'john.doe2@gmail.com'
        ]);
    }

    public function test_registion_duplicate_error(): void
    {
        // insert duplicate record first
        User::factory()->create(['email' => 'john.doe2@gmail.com']);

        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe2@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role_id' => Roles::where('name', 'user')->first()->id,
        ];

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->postJson('api/register', $data);

        $response->assertStatus(422)
            ->assertJson(['message' => 'The email has already been taken.'])
            ->assertJsonStructure(['status', 'message', 'data' => ['email']]);

        $this->assertEquals(1, User::where('email', 'john.doe2@gmail.com')->count());
    }

    public function test_registration_with_unmatch_password_error(): void
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe2@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'different_password',
            'role_id' => Roles::where('name', 'user')->first()->id,
        ];

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->postJson('api/register', $data);

        $response->assertStatus(422)
            ->assertJson(['message' => 'The password field confirmation does not match.'])
            ->assertJsonStructure(['status', 'message', 'data' => ['password']]);

        $this->assertDatabaseMissing('users', [
            'email' => 'john.doe2@gmail.com'
        ]);
    }
}
