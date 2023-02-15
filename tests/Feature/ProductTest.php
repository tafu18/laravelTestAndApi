<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function testProductRouteReturnOk()
    {
        $response = $this->get('/product');
        $response->assertStatus(200);
        $response->assertSee('Products Index');
    }

    public function testProductHasName()
    {
        $product = Product::factory()->create();

        $this->assertNotEmpty($product->name);
    }

    public function testProductsAreEmpty()
    {
        $response = $this->get('/product');
        $response->assertSee('No Products');
    }

    public function testProductsAreNotEmpty()
    {
        $product = Product::factory()->create();
        $response = $this->get('/product');
        $response->assertDontSee('No Products');
    }

    public function testProductName()
    {
        $product = Product::factory()->create([
            'name' => 'Orange',
            'category_id' => Category::factory(),
            'type' => 'Fruit',
            'price' => 12.50,

        ]);

        $response = $this->get('product');
        $this->assertEquals($product->name, 'Orange');
        $response->assertSee($product->name);
    }

    public function testAuthCanSeeTheBuyButton()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $product = Product::factory()->create();
        $response = $this->actingAs($admin)->get('/product');
        $response->assertSee('Edit');
    }

    public function testDescprition()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create([
            'name' => 'Orange',
            'category_id' => Category::factory(),
            'type' => 'Fruit',
            'price' => 12.55,
            'description' => 'Test Description Test',
        ]);

        $response = $this->actingAs($user)->get('/product');
        $this->assertEquals('Test Description Test', $product->description);
    }

    public function testAuthCannotSeeTheBuyButton()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/product');
        $response->assertDontSee('Edit');
    }

    public function testAuthAdminCanSeeCreateLink()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($admin)->get('/product');
        $response->assertSee('Create');
    }

    public function testUnauthCannotSeeCreateLink()
    {
        $response = $this->get('/product');
        $response->assertDontSee('Create');
    }

    public function testAuthAdminCanVisitTheProductsCreateRoute()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($admin)->get('/product/create');
        $response->assertStatus(200);
    }

    public function testUnauthUserCannotVisitTheProductsCreateRoute()
    {
        $response = $this->get('/product/create');
        $response->assertStatus(403);
    }

    public function testAdminCanStoreNewProduct()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        Category::factory()->create();
        $response = $this->actingAs($admin)->post('/product', [
            'name' => 'Apple',
            'category_id' => Category::first()->id,
            'type' => 'Fruit',
            'price' => 12.99,
            'description' => 'Deneme Deneme Deneme Deneme',
        ]);

        $response->assertRedirect('/product');
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('products', ['name' => 'Apple']);
    }

    public function testAdminCanSeeTheEditProductPage()
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
