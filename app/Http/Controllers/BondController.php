<?php

namespace App\Http\Controllers;

use App\Lib\Repositories\BondRepository;
use App\Lib\Services\BondService;

class BondController extends Controller
{
    public function __construct(private BondRepository $bondRepository)
    {
    }

    public function payouts(int $id)
    {
        $bond = $this->bondRepository->selectById($id);
        $periodDuration = BondService::calculatePeriod($bond);
        $dateArr = BondService::interestPaymentDates($bond, $periodDuration);

        return success($dateArr, 'dates', 200);
    }
}
