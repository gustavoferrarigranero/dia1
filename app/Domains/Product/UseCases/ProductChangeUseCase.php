<?php

namespace App\Domains\Product\UseCases;

use App\Domains\Product\DTOs\ProductStoreDTO;

class ProductChangeUseCase
{
    public static function changeValue(ProductStoreDTO $dto, float $newPrice): void
    {
        $dto->changePrice($newPrice);
    }
}