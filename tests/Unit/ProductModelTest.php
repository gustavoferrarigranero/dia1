<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class ProductModelTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_creates_and_saves_a_product(): void
    {
        $category = Category::create([
            'name' => 'Test Category',
        ]);

        $product = new Product([
            'name' => 'Test Product',
            'price' => 99.99,
            'category_id' => $category->id,
        ]);

        $product->save();

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'price' => 99.99,
            'category_id' => $category->id,
        ]);

        $this->assertModelExists($product);
        $this->assertSame('Test Product', $product->name);
        $this->assertSame('99.99', $product->price);
        $this->assertSame($category->id, $product->category_id);
    }
}
