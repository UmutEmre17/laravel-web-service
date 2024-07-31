<?php

namespace App\Services;

use  App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Services\ApiResponseService;
use App\Enums\ApiResponseMessage;

class CategoryService
{
    protected $apiResponseService;
    public function __construct(ApiResponseService $apiResponseService)
    {
        $this->apiResponseService = $apiResponseService;
    }

    public function  createCategory(array $data)
    {
        if ($this->isAdmin()) {
            $category = Category::create($data);

            return $this->apiResponseService->success($category, ApiResponseMessage::CATEGORY_CREATED, 201);
        } else {
        abort(403, 'Unauthorized action.');
        }
    }

    public function getAllCategories()
    {
        $categories = Category::all();
        return  $this->apiResponseService->success($categories);
    }

    public function getCategory($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return $this->apiResponseService->notFound();
        }  
        return $this->apiResponseService->success($category);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return $this->apiResponseService->notFound();
        }  

        if ($this->isAdmin()) {
            $category->delete();

            return $this->apiResponseService->success(null, ApiResponseMessage::CATEGORY_DELETED, 201);
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