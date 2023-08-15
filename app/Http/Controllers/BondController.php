<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseOrderRequest;
use App\Lib\Repositories\BondRepository;
use App\Lib\Repositories\PurchaseOrderRepository;
use App\Lib\Services\BondService;
use Illuminate\Http\Response;

class BondController extends Controller
{
    public function __construct(private BondRepository $bondRepository, private PurchaseOrderRepository $purchaseOrderRepository)
    {
    }

    public function payouts(int $id)
    {
        $bond = $this->bondRepository->selectById($id);
        $periodDuration = BondService::calculatePeriod($bond);
        $dateArr = BondService::interestPaymentDates($bond, $periodDuration);

        return success($dateArr, 'dates', Response::HTTP_OK);
    }

    public function order(int $idBond, PurchaseOrderRequest $request)
    {
        $data = $request->validated();
        $data['fk_id_bond'] = $idBond;

        $purchaseOrder = $this->purchaseOrderRepository->insert($data);
        return success($purchaseOrder->toArray(), 'purchaseOrder', Response::HTTP_CREATED);
    }

    public function amount($idOrder)
    {
        $order = $this->purchaseOrderRepository->selectById($idOrder);
        $periodDuration = BondService::calculatePeriod($order->bond);
        $dateArr = BondService::interestPaymentDates($order->bond, $periodDuration);
        $payouts = BondService::calculateAmount($dateArr, $order);

        return success($payouts, 'payouts', Response::HTTP_OK);
    }
}
