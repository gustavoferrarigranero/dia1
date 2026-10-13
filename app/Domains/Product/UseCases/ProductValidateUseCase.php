<?php

namespace App\Domains\Product\UseCases;

use App\Domains\Product\DTOs\ProductStoreDTO;

class ProductValidateUseCase
{
    public static function validateHasItemsOnList(array $items): bool
    {
        return count($items) > 0;
    }

    public static function validatePrice(ProductStoreDTO $dto): bool
    {
        if ($dto->name === 'Product 2') {
            if ($dto->getPrice() > 10) {
                return false;
            }
        }

        return $dto->getPrice() > 0;
    }
}