<?php

namespace App\Repository;

use App\Interface\Repository\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function findMany()
    {
        return Product::paginate(10);
    }

    public function findOneById(int $id)
    {
        return Product::findOrFail($id);
    }

    public function create(object $payload)
    {
        $product = new Product();
        $product->product_category_id = $payload->product_category_id;
        $product->barcode = $payload->barcode;
        $product->name = $payload->name;
        $product->brand = $payload->brand;
        $product->quantity_onhand = $payload->quantity_onhand;
        $product->wholesale_unit = $payload->wholesale_unit;
        $product->retail_unit = $payload->retail_unit;
        $product->wholesale_quantity = $payload->wholesale_quantity;
        $product->current_price = $payload->current_price;
        $product->expiry_date = $payload->expiry_date;
        $product->reorder_point = $payload->reorder_point;
        $product->markup = $payload->markup;
        $product->is_active = $payload->is_active;
        $product->save();

        return $product->fresh();
    }

    public function update(object $payload, int $id)
    {
        $product = Product::findOrFail($id);
        $product->product_category_id = $payload->product_category_id;
        $product->barcode = $payload->barcode;
        $product->name = $payload->name;
        $product->brand = $payload->brand;
        $product->quantity_onhand = $payload->quantity_onhand;
        $product->wholesale_unit = $payload->wholesale_unit;
        $product->retail_unit = $payload->retail_unit;
        $product->wholesale_quantity = $payload->wholesale_quantity;
        $product->current_price = $payload->current_price;
        $product->expiry_date = $payload->expiry_date;
        $product->reorder_point = $payload->reorder_point;
        $product->markup = $payload->markup;
        $product->is_active = $payload->is_active;
        $product->save();

        return $product->fresh();
    }

    public function delete(int $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return true;
    }
}
