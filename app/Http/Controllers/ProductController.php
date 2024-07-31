<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->middleware('auth:sanctum');
        $this->middleware('role:admin');
        $this->productService = $productService;
    }

    public function getProducts()
    {
        return $this->productService->getAllProducts();
    }

    public function getProduct($id)
    {
        return $this->productService->getProductById($id);
    }

    public function addProduct(StoreProductRequest $request)
    {
       return $this->productService->createProduct($request->all());
    }
   
    public function deleteProduct($id)
    {
        return $this->productService->deleteProduct($id);
    }

    public function updateProduct(UpdateProductRequest $request, $id)
    {
        return $this->productService->updateProduct($id, $request->all());
    }
}
