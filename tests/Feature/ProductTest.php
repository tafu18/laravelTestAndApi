<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

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
    }
}
