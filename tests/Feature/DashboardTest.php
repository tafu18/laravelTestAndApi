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

    public function testStatus()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create();

        $response = $this->get('/api/dashboard');
        $response->assertStatus(200);
    }

/*     public function testDashboard()
    {
        $category = Category::factory()->create();

        $product = Product::factory()->create([
            'category_id' => $category->id,
        ]);

        $this->json('GET', '/api/dashboard')
            ->assertJsonStructure(
                [
                    'groupByCategory' => [
                        [
                            'name',
                            'counter',
                        ],

                    ],
                    'last2DaysProducts',
                    'categories',
                    'products',
                ]
            )->assertJsonFragment([
                'categories' =>1,
                'products',
                'last2DaysProducts',
                'groupByCategory',
            ])
            ->assertStatus(200);
    } */
}
