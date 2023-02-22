<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected string $endpoint = 'api/categories/';

    protected string $categoryTable = 'categories';

    public function testIndexCategory()
    {
        $category = Category::factory()->count(10)->create();
        $response = $this->get($this->endpoint);

        $this->assertDatabaseCount($this->categoryTable, 10);
    }

    public function testStoreCategory()
    {
        $data = ['name' => $this->faker->name];
        $response = $this->post($this->endpoint, $data);

        $response->assertStatus(201);
        $this->assertDatabaseCount($this->categoryTable, 1);
        $this->assertDatabaseHas($this->categoryTable, $data);
    }

    public function testShowCategory()
    {
        $category = Category::factory()->create();

        $response = $this->get($this->endpoint.$category->id);
        $response->assertStatus(200);
        $response->assertSee($category->name);

        $this->assertDatabaseCount($this->categoryTable, 1);
    }

    public function testUpdateCategory()
    {
        $category = Category::factory()->create();

        $data = ['name' => $this->faker->name];
        $this->put($this->endpoint.$category->id, $data)->assertStatus(200);

        $category->refresh();
        $this->assertEquals($category->name, $data['name']);
    }

    public function testDeleteCategory()
    {
        $category = Category::factory()->create();

        $response = $this->delete($this->endpoint.$category->id);
        $response->assertStatus(204);

        $this->assertDatabaseCount($this->categoryTable, 0);
        $this->assertModelMissing($category);
    }
}
