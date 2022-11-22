<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/api/articles');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $publishedAt = \DateTime::createFromFormat('Y-m-d H:i:s', '2022-11-21 00:00:00');
        $article = new Article();
        $article->title = fake()->name();
        $article->featured = fake()->boolean();
        $article->url = fake()->url();
        $article->imageUrl = fake()->url();
        $article->newsSite = fake()->name();
        $article->summary = fake()->text();
        $article->publishedAt = $publishedAt->format('Y-m-d H:i:s');

        $response = $this->post('/api/articles' , $article->toArray());
        $response->assertStatus(201);

    }

    public function test_show()
    {
        $article = Article::query()->inRandomOrder()->first();
        $response = $this->get("api/articles/$article->id");
        $response->assertStatus(201);

    }

    public function test_update()
    {
        $article = Article::query()->inRandomOrder()->first();
        $article->title = fake()->name();
        $article->featured = fake()->boolean();
        $article->url = fake()->url();
        $response = $this->put("/api/articles/$article->id", $article->toArray());
        $response->assertStatus(200);

    }

    public function test_destroy()
    {
        $article = Article::query()->inRandomOrder()->first();
        $response = $this->delete("api/articles/$article->id");
        $response->assertStatus(204);

    }


}
