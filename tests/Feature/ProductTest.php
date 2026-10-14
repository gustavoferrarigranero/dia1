<?php

namespace Feature;

 use App\Models\Product;
 use Illuminate\Foundation\Testing\DatabaseTransactions;
 use Illuminate\Foundation\Testing\RefreshDatabase;
 use Tests\TestCase;

 class ProductTest extends TestCase
{
    use RefreshDatabase;

    private Product $product;

    protected function setUp(): void
    {
        parent::setUp();

        $this->product = Product::create([
            'name' => 'Produto de teste',
            'price' => 10,
        ]);
    }

    public function test_the_application_returns_a_successful_respo(): void
    {
        $this->assertNotNull($this->product);

        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSeeHtml('Produto de teste');

    }
}
