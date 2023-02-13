<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_route_return_ok()
    {
        $response = $this->get('/product');
        $response->assertStatus(200);
        $response->assertSee('Products Index');
    }

    public function test_product_has_name()
    {
        $product = Product::factory()->create();

        $this->assertNotEmpty($product->name);
    }

    public function test_products_are_empty()
    {
        $response = $this->get('/product');
        $response->assertSee('No Products');
    }

    public function test_products_are_not_empty()
    {
        $product = Product::factory()->create();
        $response = $this->get('/product');
        $response->assertDontSee('No Products');
    }

    public function test_product_name()
    {
        $product = Product::factory()->create([
            'name' => 'Orange',
            'type' => 'Fruit',
            'price' => 12.50,
        ]);

        $response = $this->get('product');
        $this->assertEquals($product->name, 'Orange');
        $response->assertSee($product->name);
    }

    public function test_auth_can_see_the_buy_button()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $product = Product::factory()->create();
        $response = $this->actingAs($admin)->get('/product');
        $response->assertSee('Edit');
    }

    public function test_descprition()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create([
            'name' => 'Orange',
            'type' => 'Fruit',
            'price' => 12.55,
            'description' => 'Test Description Test',
        ]);

        $response = $this->actingAs($user)->get('/product');
        $this->assertEquals('Test Description Test', $product->description);
    }

    public function test_auth_cannot_see_the_buy_button()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/product');
        $response->assertDontSee('Edit');
    }

    public function test_auth_admin_can_see_create_link()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($admin)->get('/product');
        $response->assertSee('Create');
    }

    public function test_unauth_cannot_see_create_link()
    {
        $response = $this->get('/product');
        $response->assertDontSee('Create');
    }

    public function test_auth_admin_can_visit_the_products_create_route()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($admin)->get('/product/create');
        $response->assertStatus(200);
    }

    public function test_unauth_user_cannot_visit_the_products_create_route()
    {
        $response = $this->get('/product/create');
        $response->assertStatus(403);
    }

    public function test_admin_can_store_new_product()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($admin)->post('/product', [
            'name' => 'Apple',
            'type' => 'Fruit',
            'price' => 12.99,
        ]);
        $response->assertSessionHasNoErrors();

        $response->assertRedirect('/product');
        $response->assertStatus(302);
        $this->assertDatabaseHas('products', ['name' => 'Apple']);
    }

    public function test_admin_can_see_the_edit_product_page()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $product = Product::factory()->create();

        $response = $this->actingAs($admin)->get('/product/'.$product->id.'/edit');
        $response->assertStatus(200);
        $response->assertSee($product->name);
    }

    public function testAdminCanUpdateProduct()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        Product::factory()->create();
        $this->assertCount(1, Product::all());

        $product = Product::first();
        $response = $this->actingAs($admin)->put('/product/'.$product->id, [
            'name' => 'TestName',
            'type' => 'TestType',
            'price' => 14.99,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/product');
        $this->assertEquals('TestName', Product::first()->name);
        $this->assertEquals('TestType', Product::first()->type);
        $this->assertEquals('14.99', Product::first()->price);
    }

    public function testAdminCanDeleteProduct()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $product = Product::factory()->create();
        $this->assertCount(1, Product::all());
        $response = $this->actingAs($admin)->get('/product/'.$product->id);
        $this->assertCount(0, Product::all());
    }
}
