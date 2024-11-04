<?php

namespace App\Interface\Service;

interface ProductServiceInterface
{
    public function findProducts();

    public function findProductById(int $id);

    // public function findProdctByName(string $productname);

    public function createProduct(object $payload);

    public function updateProduct(object $payload, int $id);

    public function removeProduct(int $id);
}
