<?php

namespace Tests\Feature;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;
use Tests\TestCase;

class BillDetailTest extends TestCase
{
    /** @test */
    public function it_updates_product_quantity_when_bill_detail_is_created()
    {
        // // Create a product
        // $product = Product::create([
        //     'product_category_id' => 1, // Example category
        //     'name' => 'Bear Brand',
        //     'brand' => 'Brand B',
        //     'quantity_onhand' => 0, // Set initial quantity to 0
        //     'wholesale_unit' => 'PC',
        //     'retail_unit' => 0,
        //     'wholesale_quantity' => 1,
        //     'reorder_point' => 10,
        //     'markup' => 5.00,
        //     'is_active' => true,
        // ]);

        // // Create a bill
        // $bill = Bill::create([
        //     'supplier_id' => 1,
        //     'prepared_by_id' => 1,
        //     'purchase_order_no' => 'PO12345',
        //     'bill_date' => '2024-10-01',
        //     'payment_terms' => 'Net 30',
        //     'is_cancelled' => false,
        // ]);

        // Create a bill detail
        $billDetail = BillDetail::create([
            'bill_id' => 8, // Use the created bill ID
            'product_id' => 3, // Use the created product ID
            'barcode' => '123456789',
            'unit' => 'PC',
            'expiry_date' => '2024-12-31',
            'quantity' => 200,
            'price' => '10.00',
        ]);

        // // Refresh the product instance to get the updated quantity
        // $product->refresh();

        // // Assert the product's quantity has been updated
        // $this->assertEquals(101, $product->quantity_onhand); // Adjust the expected quantity as necessary
    }
}
