<?php

namespace Tests\Unit;

use App\Domains\Product\DTOs\ProductStoreDTO;
use App\Domains\Product\UseCases\ProductChangeUseCase;
use App\Domains\Product\UseCases\ProductValidateUseCase;
use PHPUnit\Framework\TestCase;

class ProductUseCaseTest extends TestCase
{
    public function test_validate_price(): void
    {
        $dto = new ProductStoreDTO(
            name: 'Produto 1',
            price: 12,
            categoryId: 1
        );

        $this->assertEquals('Produto 1', $dto->name);
        $this->assertEquals(12, $dto->getPrice());

        $this->assertTrue(
            ProductValidateUseCase::validatePrice($dto)
        );
    }

    public function test_validate_price_for_product2(): void
    {
        $dto = new ProductStoreDTO(
            name: 'Product 2',
            price: 15,
            categoryId: 1
        );

        $this->assertEquals('Product 2', $dto->name);
        $this->assertEquals(15, $dto->getPrice());

        $this->assertFalse(
            ProductValidateUseCase::validatePrice($dto)
        );
    }

    public function test_validate_has_items_on_list(): void
    {
        $items = ['item1', 'item2', 'item3'];

        $this->assertTrue(
            ProductValidateUseCase::validateHasItemsOnList($items)
        );

        $emptyItems = [];

        $this->assertFalse(
            ProductValidateUseCase::validateHasItemsOnList($emptyItems)
        );
    }

    public function test_change_price(): void
    {
        $dto = new ProductStoreDTO(
            name: 'Product 3',
            price: 7,
            categoryId: 1
        );

        $this->assertEquals(7, $dto->getPrice());
        $this->assertEquals('Product 3', $dto->name);

        ProductChangeUseCase::changeValue($dto, 10);

        $this->assertEquals(10, $dto->getPrice());
    }
}
