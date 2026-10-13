<?php

namespace App\Services;

use App\Domains\Product\DTOs\ProductStoreDTO;
use App\Domains\Product\Interfaces\CategoryRepositoryInterface;
use App\Domains\Product\Interfaces\ProductRepositoryInterface;
use App\Domains\Product\UseCases\ProductChangeUseCase;
use App\Domains\Product\UseCases\ProductValidateUseCase;

class CategoryService
{
    
    public function __construct(
        public readonly CategoryRepositoryInterface $categoryRepository
    )
    {

    }

    public function listAll(): array
    {
        return $this->categoryRepository->all();
    }
}
