<?php

namespace App\Repositories\Eloquent;

use App\Domains\Product\DTOs\ProductStoreDTO;
use App\Domains\Product\Interfaces\CategoryRepositoryInterface;
use App\Domains\Product\Interfaces\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct()
    {
    }

    public function all(): array
    {
        return Category::all()->toArray();
    }
}
