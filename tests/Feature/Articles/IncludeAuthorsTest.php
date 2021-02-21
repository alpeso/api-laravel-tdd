<?php

namespace Tests\Feature\Articles;

use Tests\TestCase;
use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IncludeAuthorsTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function can_include_authors()
    {
        $article = Article::factory()->create();

        $this->jsonApi()
            ->includePaths('authors')
            ->get(route('api.v1.articles.read', $article))
            ->assertSee($article->user->name);

    }
}
