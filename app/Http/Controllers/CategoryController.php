<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    protected $categoryService;
    
    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth:sanctum');
        $this->middleware('role:admin');
        $this->categoryService = $categoryService;
    }
    public function addCategory(StoreCategoryRequest $request)
    {
        return $this->categoryService->createCategory($request->all());
    }

    public function getCategories()
    {
        return $this->categoryService->getAllCategories();
    }

    public function getCategory($id)
    {
        return $this->categoryService->getCategory($id);
    }

    public function deleteCategory($id)
    {
        return $this->categoryService->deleteCategory($id);
    }
}
