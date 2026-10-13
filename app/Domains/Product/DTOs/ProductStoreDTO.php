<?php

namespace App\Domains\Product\DTOs;

final class ProductStoreDTO
{
    public function __construct(
        public string $name,
        private float $price,
        public int $categoryId,
    ) {}

    public function getPrice(): float
    {
        return $this->price;
    }

    public function changePrice(float $price): void
    {
        $this->price = $price;
    }
}
