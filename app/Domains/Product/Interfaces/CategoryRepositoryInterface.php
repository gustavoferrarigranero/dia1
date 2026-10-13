<?php

namespace App\Domains\Product\Interfaces;

use App\Domains\Product\DTOs\ProductStoreDTO;

interface CategoryRepositoryInterface
{
    public function all(): array;
}
