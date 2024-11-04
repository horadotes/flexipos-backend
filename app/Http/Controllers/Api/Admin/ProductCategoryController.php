<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\ProductCategoryStoreRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Interface\Service\ProductCategoryServiceInterface;
use App\Models\ProductCategory;

class ProductCategoryController
{
    private $productCategoryService;

    public function __construct(ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    public function index()
    {
        return $this->productCategoryService->findProductCategories();
    }

    public function selectTrueOnly()
    {
        $categories = ProductCategory::where('isactive', true)->get();

        return response()->json($categories);
    }

    public function store(ProductCategoryStoreRequest $request)
    {
        return $this->productCategoryService->createProductCategory($request);
    }

    public function show(int $productCategoryId)
    {
        return $this->productCategoryService->findProductCategoryById($productCategoryId);
    }

    public function update(ProductCategoryUpdateRequest $request, int $productCategoryId)
    {
        return $this->productCategoryService->updateProductCategory($request, $productCategoryId);
    }

    public function destroy(int $productCategoryId)
    {
        return $this->productCategoryService->removeProductCategory($productCategoryId);
    }
}
