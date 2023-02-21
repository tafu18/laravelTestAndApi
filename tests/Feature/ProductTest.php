<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /* 
    public function testProductHasName()
    {
        $category = Category::factory()->create();

        $product = Product::factory()->create([
            'category_id' => $category->id,
        ]);

        $this->assertNotEmpty($product->name);
    }

    public function testProductAndCategoryHas()
    {
        $category = Category::factory()->create();

        $product = Product::factory()->create([
            'category_id' => $category->id,
        ]);

        $this->assertCount(1, Product::all());
        $this->assertEquals($category->id, $product->category_id);
    }

    public function testProductName()
    {
        $category = Category::factory()->create(['name' => 'Tech']);
        $product = Product::factory()->create([
            'name' => 'Orange',
            'category_id' => $category->id,
            'type' => 'Fruit',
            'price' => 12.50,

        ]);

        $this->assertEquals($product->name, 'Orange');
    } */








    public function testIndexProduct()
    {
        $product = Product::factory()->count(10)->create();

        $response = $this->get('api/products');
        $this->assertDatabaseCount('products', 10);
    }
 
    public function testStoreProduct()
    {
        $category = Category::factory()->create();

        $response = $this->post('api/products', [
            'name' => 'Orange',
            'category_id' => $category->id,
            'type' => 'Fruit',
            'price' => 12.55,
            'description' => 'Deneme Deneme Deneme Deneme Deneme ',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseHas('products', [
            'name' => 'Orange',
        ]);
    }

    
    public function testShowProduct()
    {
        $product = Product::factory()->create();

        $response = $this->get('api/products/'.$product->id);
        $response->assertStatus(200);
        $response->assertSee($product->name);

        $this->assertDatabaseCount('products', 1);
    }

    public function testUpdateProduct()
    {
         $category = Category::factory()->create();
/*        $product = Product::factory()->create(['category_id' => $category->id]);
 */
    $product = Product::factory()->create();
        $response = $this->put('api/products/'.$product->id, [
            'name' => 'Orange',
            'category_id' => $category->id,
            'type' => 'Fruit',
            'price' => 12.55,
            'description' => 'Deneme Deneme Deneme Deneme Deneme ',
        ]);

        $product->refresh();
        $response->assertStatus(200);
        $this->assertEquals($product->name, 'Orange');
    }
/*
    public function testDeleteProduct()
    {
        $product = Product::factory()->create();

        $response = $this->delete('api/products/'.$product->id);
        $response->assertStatus(204);

        $this->assertDatabaseCount('products', 0);
        $this->assertModelMissing($category);
    }






 */
}
