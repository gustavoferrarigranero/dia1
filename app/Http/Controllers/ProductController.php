<?php

namespace App\Http\Controllers;

use App\Domains\Product\DTOs\ProductStoreDTO;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(
        public readonly ProductService $service
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
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $dto = new ProductStoreDTO(
                $request->validated('name'),
                $request->validated('price')
            );

            $product = $this->service->create($dto);

            return view('products.show', ['product' => $product]);

        } catch (\DomainException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }
}
