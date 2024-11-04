<?php

namespace App\Service;

use App\Http\Resources\ProductCategoryResource;
use App\Interface\Repository\ProductCategoryRepositoryInterface;
use App\Interface\Service\ProductCategoryServiceInterface;

class ProductCategoryService implements ProductCategoryServiceInterface
{
    private $productCategoryRepository;

    public function __construct(ProductCategoryRepositoryInterface $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }

    public function findProductCategories()
    {
        $productCategories = $this->productCategoryRepository->findMany();

        return ProductCategoryResource::collection($productCategories);
    }

    public function findProductCategoryById(int $id)
    {
        $productCategory = $this->productCategoryRepository->findOneById($id);

        return new ProductCategoryResource($productCategory);
    }

    public function createProductCategory(object $payload)
    {
        $productCategory = $this->productCategoryRepository->create($payload);

        return new ProductCategoryResource($productCategory);
    }

    public function updateProductCategory(object $payload, int $id)
    {
        $productCategory = $this->productCategoryRepository->update($payload, $id);

        return new ProductCategoryResource($productCategory);
    }

    public function removeProductCategory(int $id)
    {
        return $this->productCategoryRepository->delete($id);
    }
}
