<?php

namespace App\Service;

use App\Http\Resources\ProductResource;
use App\Interface\Repository\ProductRepositoryInterface;
use App\Interface\Service\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function findProducts()
    {
        $products = $this->productRepository->findMany();

        return ProductResource::collection($products);
    }

    public function findProductById(int $id)
    {
        $product = $this->productRepository->findOneById($id);

        return new ProductResource($product);
    }

    public function createProduct(object $payload)
    {
        $product = $this->productRepository->create($payload);

        return new ProductResource($product);
    }

    public function updateProduct(object $payload, int $id)
    {
        $product = $this->productRepository->update($payload, $id);

        return new ProductResource($product);
    }

    public function removeProduct(int $id)
    {
        return $this->productRepository->delete($id);
    }
}
