<?php

namespace App\Repositories\Eloquent;

use App\Domains\Product\DTOs\ProductStoreDTO;
use App\Domains\Product\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct()
    {
    }

    public function all(): array
    {
        return Product::query()
            ->with('category')
            ->get()->toArray();
    }

    public function create(ProductStoreDTO $dto): object
    {
        $product = new Product();
        $product->name = $dto->name;
        $product->price = $dto->getPrice();
        $product->category_id = $dto->categoryId;

        $product->save();

        return $product;
    }
}
