<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostResourceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Get /posts test
     * 
     * @return void
     */
    public function test_get_posts(): void
    {
        $posts = Post::factory()->count(3)->create();
        $response = $this->get('/api/posts');

        $response->assertJsonCount(3);
    }

    /**
     * Post /posts test
     * 
     * @return void
     */
    public function test_post_post(): void
    {
        $response = $this->post('/api/posts', [
            'title' => fake()->sentence(),
            'content' => fake()->paragraph()
        ]);

        $response->assertSuccessful();
    }

    /**
     * Get /posts/{:id} test
     * 
     * @return void
     */
    public function test_get_post(): void
    {
        $post = Post::factory()->create();
        $response = $this->get('/api/posts/' . $post->id);

        $response->assertSuccessful();
    }

    /**
     * Put /posts/{:id} test
     * 
     * @return void
     */
    public function test_put_posts(): void
    {
        $post = Post::factory()->create();
        $updatedTitle = fake()->sentence();
        $response = $this->put('/api/posts/' . $post->id, [
            'title' => $updatedTitle
        ]);

        $response->assertJsonFragment(['title' => $updatedTitle]);
    }

    /**
     * Delete /posts/{:id} test
     * 
     * @return void
     */
    public function test_delete_posts(): void
    {
        $post = Post::factory()->create();
        $response = $this->delete('/api/posts/' . $post->id);

        $response->assertContent('1');
    }
}
