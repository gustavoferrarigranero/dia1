<?php

namespace App\Services;

use App\Domains\Product\DTOs\ProductStoreDTO;
use App\Domains\Product\Interfaces\ProductRepositoryInterface;
use App\Domains\Product\UseCases\ProductChangeUseCase;
use App\Domains\Product\UseCases\ProductValidateUseCase;

class ProductService
{
    
    public function __construct(
        public readonly ProductRepositoryInterface $productRepository
    )
    {

    }

    public function listAll(): array
    {
        $items = $this->productRepository->all();

        if (!ProductValidateUseCase::validateHasItemsOnList($items)) {
            throw new \DomainException('No products found.');
        }

        return $items;
    }

    public function create(ProductStoreDTO $dto): object
    {
        if (!ProductValidateUseCase::validatePrice($dto)) {
            throw new \DomainException('Invalid product price or named product 2 with price greater than 10.');
        }

        ProductChangeUseCase::changeValue($dto, 15);

        return $this->productRepository->create($dto);
    }
}
