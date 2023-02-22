<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected string $endpoint = 'api/products/';

    protected string $ProductsTable = 'products';

    public function testIndexProduct()
    {
        $product = Product::factory()->count(10)->create();

        $response = $this->get($this->endpoint);
        $this->assertDatabaseCount($this->ProductsTable, 10);
    }

    public function testStoreProduct()
    {
        $category = Category::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'category_id' => $category->id,
            'type' => 'Fruit',
            'price' => 12.55,
            'description' => 'Deneme Deneme Deneme Deneme Deneme ',
        ];

        $this->post($this->endpoint, $data)->assertStatus(201);

        $this->assertDatabaseCount($this->ProductsTable, 1);
        $this->assertDatabaseHas($this->ProductsTable, [
            'name' => $data['name'],
        ]);
    }

    public function testShowProduct()
    {
        $product = Product::factory()->create();

        $response = $this->get($this->endpoint.$product->id);
        $response->assertStatus(200);
        $response->assertSee($product->name);

        $this->assertDatabaseCount($this->ProductsTable, 1);
    }

    public function testUpdateProduct()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create();

        $data = [
            'name' => 'Orange',
            'category_id' => $category->id,
            'type' => 'Fruit',
            'price' => 12.55,
            'description' => 'Deneme Deneme Deneme Deneme Deneme ',
        ];

        $this->put($this->endpoint.$product->id, $data)->assertStatus(200);

        $product->refresh();
        $this->assertEquals($product->name, $data['name']);
    }

    public function testDeleteProduct()
    {
        $product = Product::factory()->create();

        $response = $this->delete($this->endpoint.$product->id);
        $response->assertStatus(204);

        $this->assertDatabaseCount($this->ProductsTable, 0);
        $this->assertModelMissing($product);
    }
}
