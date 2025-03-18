<?php

use App\Models\User;
use App\Models\Category; // Assuming you have a Category model for the category_id
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Laravel\Passport\Passport;
use App\Models\Blog; // The Blog model

class BlogApiTest extends TestCase
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

        // Seed categories and any other necessary data
        $this->seed();
    }

    public function test_create_blog()
    {
        $user = User::factory()->create(); // Create a test user
        $category = Category::first() ?? Category::factory()->create(); // Ensure a category exists

        Passport::actingAs($user);

        $response = $this->postJson('/api/v1/blogs', [
            'title' => 'New Blog Title',
            'content' => 'This is the content of the new blog.',
            'category_id' => $category->id, // Add a valid category_id
            'user_id' => $user->id, // Ensure the blog has an author (user)
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'title' => 'New Blog Title',
                'content' => 'This is the content of the new blog.',
            ]);
    }

    public function test_get_blogs()
    {
        $user = User::factory()->create(); // Create a test user
        $blog = Blog::factory()->create(['user_id' => $user->id]); // Create a test blog for the user

        Passport::actingAs($user);

        $response = $this->getJson('api/v1/blogs');

        $response->assertStatus(200)
            ->assertJsonFragment([
                'title' => $blog->title,
                'content' => $blog->content,
            ]);
    }

    public function test_update_blog()
    {
        $user = User::factory()->create(); // Create a test user
        $category = Category::first() ?? Category::factory()->create(); // Ensure a category exists
        $blog = Blog::factory()->create(['user_id' => $user->id]); // Create a test blog for the user

        Passport::actingAs($user);

        $response = $this->putJson("api/v1/blogs/{$blog->id}", [
            'title' => 'Updated Blog Title',
            'content' => 'Updated content for the blog.',
            'category_id' => $category->id, // Ensure this category exists
            'user_id' => $user->id, // Ensure the blog still has the correct user
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'title' => 'Updated Blog Title',
                'content' => 'Updated content for the blog.',
            ]);
    }

    public function test_delete_blog()
    {
        $user = User::factory()->create(); // Create a test user
        $blog = Blog::factory()->create(['user_id' => $user->id]); // Create a test blog for the user

        Passport::actingAs($user);

        $response = $this->deleteJson("api/v1/blogs/{$blog->id}", []);

        $response->assertStatus(204);
    }
}
