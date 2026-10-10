<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_product_submission_persists_product(): void
    {
        $response = $this->post(route('produk.store'), $this->validProductData());

        $response->assertRedirect(route('produk.index'))
            ->assertSessionHas('sukses', 'Produk berhasil ditambahkan.');
        $this->assertDatabaseHas('products', $this->validProductData());
    }

    public function test_invalid_product_submission_returns_validation_errors(): void
    {
        $response = $this->from(route('produk.create'))
            ->post(route('produk.store'), array_merge($this->validProductData(), ['email' => 'invalid-email']));

        $response->assertRedirect(route('produk.create'))
            ->assertSessionHasErrors('email');
        $this->assertDatabaseCount('products', 0);
    }

    public function test_product_update_persists_changed_values(): void
    {
        $product = Product::query()->create($this->validProductData());
        $updatedData = array_merge($this->validProductData(), [
            'nama' => 'Laptop Pro',
            'harga' => 8500000,
        ]);

        $response = $this->put(route('produk.update', $product), $updatedData);

        $response->assertRedirect(route('produk.index'))
            ->assertSessionHas('sukses', 'Produk berhasil diperbarui.');
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'nama' => 'Laptop Pro',
            'harga' => 8500000,
        ]);
    }

    public function test_product_delete_removes_record(): void
    {
        $product = Product::query()->create($this->validProductData());

        $response = $this->delete(route('produk.destroy', $product));

        $response->assertRedirect(route('produk.index'))
            ->assertSessionHas('sukses', 'Produk berhasil dihapus.');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_edit_form_contains_saved_product_values(): void
    {
        $product = Product::query()->create($this->validProductData());

        $this->get(route('produk.edit', $product))
            ->assertOk()
            ->assertSee('Laptop')
            ->assertSee('laptop@example.com');
    }

    public function test_missing_product_detail_returns_not_found(): void
    {
        $this->get('/produk/999')
            ->assertNotFound();
    }

    public function test_dashboard_page_displays_summary(): void
    {
        Product::query()->create([
            'nama' => 'Laptop',
            'harga' => 7500000,
            'stok' => 10,
            'email' => 'laptop@example.com',
            'kategori' => 'elektronik',
        ]);

        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Dashboard')
            ->assertSee('Produk');
    }

    /** @return array{nama: string, harga: int, stok: int, email: string, kategori: string} */
    private function validProductData(): array
    {
        return [
            'nama' => 'Laptop',
            'harga' => 7500000,
            'stok' => 10,
            'email' => 'laptop@example.com',
            'kategori' => 'elektronik',
        ];
    }
}
