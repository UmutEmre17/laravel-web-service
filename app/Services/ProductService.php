<?php

namespace App\Services;

use  App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Services\ApiResponseService;
use App\Enums\ApiResponseMessage;

class ProductService
{
    protected $apiResponseService;
    public function __construct(ApiResponseService $apiResponseService)
    {
        $this->apiResponseService = $apiResponseService;
    }
    
    public function getAllProducts()
    {
        $products = Product::with('categories')->get()->map->transform();

        return $this->apiResponseService->success($products);
    }

    public function getProductById($id)
    {
         $product = Product::with('categories')->find($id);
         if ($product) {
            return $this->apiResponseService->success($product->transform());
        } else {
            return $this->apiResponseService->notFound();
        }
    }

    public function createProduct(array $data)
    {
        $category = Category::find($data['category_id']);

        if (!$category) {
            return $this->apiResponseService->notFound(ApiResponseMessage::CATEGORY_NOT_FOUND);
        }
       
        if ($this->isAdmin())  {
            $product = Product::create($data);

            return $this->apiResponseService->success($product, ApiResponseMessage::PRODUCT_CREATED, 201);
        } else {
        abort(403, 'Unauthorized action.');
    }
        
    }

    public function updateProduct($id, $data)
    {
        $product = Product::find($id);

        if (!$product) {
            return $this->apiResponseService->notFound();
        }

        if ($this->isAdmin()) {
            $product->update($data);

            return $this->apiResponseService->success($product, ApiResponseMessage::PRODUCT_UPDATED, 201);   
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return $this->apiResponseService->notFound();
        }  

        if ($this->isAdmin()) {
            $product->delete();
            return $this->apiResponseService->success(null, ApiResponseMessage::PRODUCT_DELETED, 201);
        } else {
            abort(403, 'Unauthorized action.');
        } 
    }

    private function isAdmin()
    {
        $user = Auth::user();
        return $user && $user->hasRole('admin');
    }
}
