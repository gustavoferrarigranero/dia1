<?php

namespace App\Http\Controllers;

use App\Domains\Product\DTOs\ProductStoreDTO;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;

class ProductController extends Controller
{

    public function __construct(
        public readonly ProductService $service,
        public readonly CategoryService $categoryService,
    )
    {
    }

    public function index()
    {
        try {
            return view('products.list', ['products' => $this->service->listAll()]);
        } catch (\DomainException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function create()
    {
        return view('products.create', [
            'categories' => $this->categoryService->listAll()]
        );
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $dto = new ProductStoreDTO(
                $request->validated('name'),
                $request->validated('price'),
                $request->validated('category_id'),
            );

            $product = $this->service->create($dto);

            return view('products.show', ['product' => $product]);

        } catch (\DomainException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function show(Product $product)
    {
        $product->loadMissing('category');

        return view('products.show', ['product' => $product]);
    }
}
