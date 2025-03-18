<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use App\Models\Role;
use Laravel\Passport\Passport;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        if (!Passport::personalAccessClient()) {
            Artisan::call('passport:install');
        }

        // Run migrations
        Artisan::call('migrate');

        // Seed roles if necessary
        $this->seed();
    }

    public function test_create_user()
    {
        $role = Role::first(); // Get an existing role

        Passport::actingAs(User::factory()->create());

        $response = $this->postJson('/api/v1/users', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password123',  // Make sure the password has at least 8 characters
            'role_id' => $role->id, // Ensure this role exists
            'category' => 'general', // Add a valid category
        ]);

        $response->assertStatus(201);
    }

    public function test_get_users()
    {
        $user = User::factory()->create(); // Create a test user

        // Generate an API token for the test user
        Passport::actingAs($user);

        $response = $this->getJson('api/v1/users');

        $response->assertStatus(200);
    }

    public function test_update_user()
    {
        $user = User::factory()->create(); // Create a test user

        Passport::actingAs($user);

        // Ensure a role exists before assigning it
        $role = Role::first() ?? Role::factory()->create();


        $response = $this->putJson("api/v1/users/{$user->id}", [
            'name' => 'Updated Name',
            'email' => 'updated@example.org',
            'category' => 'general', // Add a valid category
            'role_id' => $role->id
        ]);

        $response->assertStatus(200);
    }

    public function test_delete_user()
    {
        $user = User::factory()->create(); // Create a test user

        // Authenticate the user (or an admin if required)
        Passport::actingAs($user);

        $response = $this->deleteJson("api/v1/users/{$user->id}", []);

        $response->assertStatus(204);
    }
}
