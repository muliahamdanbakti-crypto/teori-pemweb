<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_product_listing_renders_controller_data(): void
    {
        foreach ([
            ['nama' => 'Laptop', 'harga' => 7500000, 'stok' => 10, 'email' => 'laptop@example.com', 'kategori' => 'elektronik'],
            ['nama' => 'Mouse', 'harga' => 150000, 'stok' => 0, 'email' => 'mouse@example.com', 'kategori' => 'elektronik'],
            ['nama' => 'Keyboard', 'harga' => 320000, 'stok' => 5, 'email' => 'keyboard@example.com', 'kategori' => 'atk'],
        ] as $product) {
            Product::query()->create($product);
        }

        $this->get('/produk')
            ->assertOk()
            ->assertSee(['Laptop', 'Mouse', 'Keyboard']);
    }

    public function test_product_detail_renders_the_requested_product(): void
    {
        $product = Product::query()->create([
            'nama' => 'Laptop',
            'harga' => 7500000,
            'stok' => 10,
            'email' => 'laptop@example.com',
            'kategori' => 'elektronik',
        ]);

        $this->get('/produk/'.$product->id)
            ->assertOk()
            ->assertSee('Laptop');
    }

    public function test_product_detail_rejects_a_non_numeric_id(): void
    {
        $this->get('/produk/not-a-number')
            ->assertNotFound();
    }

    public function test_product_create_form_renders_all_required_fields(): void
    {
        $this->get('/produk/create')
            ->assertOk()
            ->assertSee('name="nama"', false)
            ->assertSee('name="harga"', false)
            ->assertSee('name="stok"', false)
            ->assertSee('name="email"', false)
            ->assertSee('value="makanan"', false);
    }
}
