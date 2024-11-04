<?php

namespace App\Repository;

use App\Interface\Repository\ProductCategoryRepositoryInterface;
use App\Models\ProductCategory;

class ProductCategoryRepository implements ProductCategoryRepositoryInterface
{
    public function findMany()
    {
        return ProductCategory::paginate(10);
    }

    public function findOneById(int $id)
    {
        return ProductCategory::findOrFail($id);
    }

    public function create(object $payload)
    {
        $category = new ProductCategory();
        $category->name = $payload->name;
        $category->is_active = $payload->is_active;
        $category->save();

        return $category->fresh();
    }

    public function update(object $payload, int $id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->name = $payload->name;
        $category->is_active = $payload->is_active;
        $category->save();

        return $category->fresh();
    }

    public function delete(int $id)
    {
        $category = ProductCategory::findOrFail($id);

        $category->delete();

        return true;
    }
}
