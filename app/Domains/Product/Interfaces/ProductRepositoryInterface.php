<?php

namespace App\Domains\Product\Interfaces;

use App\Domains\Product\DTOs\ProductStoreDTO;

interface ProductRepositoryInterface
{
    public function all(): array;

    public function create(ProductStoreDTO $dto): object;
}
