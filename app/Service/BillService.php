<?php

namespace App\Service;

use App\Http\Resources\BillResource;
use App\Interface\Repository\BillRepositoryInterface;
use App\Interface\Service\BillServiceInterface;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BillService implements BillServiceInterface
{
    private $billRepository;

    public function __construct(BillRepositoryInterface $billRepository)
    {
        $this->billRepository = $billRepository;
    }

    public function findBills()
    {
        $bills = $this->billRepository->findMany();

        return BillResource::collection($bills);
    }

    public function findBillById(int $id)
    {
        $bill = $this->billRepository->findOneById($id);

        return new BillResource($bill);
    }

    public function createBills(object $payload)
    {
        $bill = $this->billRepository->create($payload);

        return new BillResource($bill);
    }

    public function updateBills(object $payload, int $id)
    {
        $bill = $this->billRepository->update($payload, $id);

        return new BillResource($bill);
    }

    // Remove bills and adjust quantities
    public function removeBills(int $billId)
    {
        return DB::transaction(function () use ($billId) {
            $bill = Bill::findOrFail($billId);
            $billDetails = $bill->billDetails; // Load bill details before deletion

            // Adjust quantities before deleting the bill
            foreach ($billDetails as $billDetail) {
                $product = $billDetail->product;
                if ($product) {
                    // Adjust the product's quantity
                    $product->quantity_onhand -= $billDetail->quantity;
                    $product->save();

                    Log::info("Adjusted Product ID: {$product->id} quantity by -{$billDetail->quantity}");
                }
            }

            // Now delete the bill
            $bill->delete();

            return response()->json(['message' => 'Bill deleted successfully'], 200);
        });
    }
}
