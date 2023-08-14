<?php

namespace App\Lib\Repositories;

use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;

class PurchaseOrderRepository
{
    public function insert($data)
    {
        DB::beginTransaction();
        try {
            $purchaseOrder = PurchaseOrder::create([
                'fk_id_bond'                    => $data['fk_id_bond'],
                'order_date'                    => $data['order_date'],
                'number_of_bonds_received'      => $data['number_of_bonds_received']
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return $purchaseOrder;
    }
}
