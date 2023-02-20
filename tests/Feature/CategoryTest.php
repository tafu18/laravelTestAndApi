<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexCategory()
    {
        $category = Category::factory()->count(10)->create();
        $response = $this->get('api/categories');

        $this->assertDatabaseCount('categories', 10);
    }

    public function testStoreCategory()
    {
        $response = $this->post('api/categories', [
            'name' => 'Tech',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseCount('categories', 1);
        $this->assertDatabaseHas('categories', [
            'name' => 'Tech',
        ]);
    }

    public function testShowCategory()
    {
        $category = Category::factory()->create();

        $response = $this->get('api/categories/'.$category->id);
        $response->assertStatus(200);
        $response->assertSee($category->name);

        $this->assertDatabaseCount('categories', 1);
    }

    public function testUpdateCategory()
    {
        $category = Category::factory()->create();

        $response = $this->put('api/categories/'.$category->id, [
            'name' => 'Agriculture',
        ]);

        $category->refresh();
        $response->assertStatus(200);
        $this->assertEquals($category->name, 'Agriculture');
    }

    public function testDeleteCategory()
    {
        $category = Category::factory()->create();

        $response = $this->delete('api/categories/'.$category->id);
        $response->assertStatus(204);

        $this->assertDatabaseCount('categories', 0);
        $this->assertModelMissing($category);
    }
}
