<?php

namespace App\Interface\Service;

interface ProductCategoryServiceInterface
{
    public function findProductCategories();

    public function findProductCategoryById(int $id);

    public function createProductCategory(object $payload);

    public function updateProductCategory(object $payload, int $id);

    public function removeProductCategory(int $id);
}
