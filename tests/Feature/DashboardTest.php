<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    protected string $endpoint = 'api/dashboard';

    public function testStatus()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create();

        $response = $this->get($this->endpoint)
        ->assertStatus(200);
    }

    public function testDashboard()
    {
        $category = Category::factory()->create();

        $product = Product::factory()->create([
            'category_id' => $category->id,
        ]);

        $product_count = $product->count();
        $category_count = $category->count();

        $this->json('GET', $this->endpoint)
            ->assertJsonStructure(
                [
                    'groupByCategory' => [
                        [
                            'name',
                            'counter',
                        ],

                    ],
                    'last2DaysProducts' => [
                        [
                            'id',
                            'name',
                            'category_id',
                            'type',
                            'price',
                            'description',
                            'created_at',
                            'updated_at',
                        ],
                    ],
                    'categories',
                    'products',
                ]
            )->assertJsonFragment([
                'categories' => $category_count,
                'products' => $product_count,
            ])->assertStatus(200);
    }
}
