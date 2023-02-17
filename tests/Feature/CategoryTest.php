<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCategoryHasName()
    {
        $category = Category::factory()->create();

        $product = Product::factory()->create([
            'category_id' => $category->id,
        ]);

        $this->assertNotEmpty($product->name);
    }

    public function testCategoriesAreNotEmpty()
    {
        $category = Category::factory()->create();

        $product = Product::factory()->create([
            'category_id' => $category->id,
        ]);

        $this->assertNotEmpty($category->name);
    }

    public function testCategoryName()
    {
        $category = Category::factory()->create(['name' => 'Tech']);
        $product = Product::factory()->create([
            'name' => 'Orange',
            'category_id' => $category->id,
            'type' => 'Fruit',
            'price' => 12.50,
        ]);

        $this->assertEquals($category->name, 'Tech');
    }

    public function testHasProductName()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        $this->assertTrue($category->products->contains($product));
    }

    public function testCategoryAndProductMatch()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        $this->assertEquals($category->id, $product->category_id);
    }

    public function testProductExists()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        $this->assertTrue($product->exists());
    }
}
