<?php

namespace App\Lib\Services;

use Carbon\Carbon;

class BondService
{
    public static function calculatePeriod($bond)
    {
        switch ($bond->interest_calculation_period) {
            case 360:
                $periodDuration = 12 / $bond->coupon_payment_frequency * 30;
                break;
            case 364:
                $periodDuration = 364 / $bond->coupon_payment_frequency;
                break;
            case 365:
                $periodDuration = 12 / $bond->coupon_payment_frequency;
                break;
        }

        return $periodDuration;
    }

    public static function interestPaymentDates($bond, $periodDuration)
    {
        $issueDate = Carbon::parse($bond->issue_date);
        $lastCirculationDate = Carbon::parse($bond->last_circulation_date);

        $dateArr = [];

        for ($date = $issueDate->addDays($periodDuration); $date->lessThan($lastCirculationDate); $date->addDays($periodDuration)) {
            $dateArr[] = ['date' => $date->addDays((new self)->isWeekend($date))->format('Y-m-d')];
            $periodDuration *= 2;
        }

        return $dateArr;
    }

    public static function calculateAmount($dateArr, $order)
    {
        $payouts = [];
        for ($i = 0; $i < count($dateArr); $i++) {
            $numberOfDaysPast = Carbon::parse($dateArr[$i]['date'])->diffInDays(Carbon::parse($order->order_date), false);
            array_push($payouts, ['date' => $dateArr[$i]['date'], 'amount' => round($order->bond->nominal_price / 100 * ($order->bond->coupon_interest) / $order->bond->interest_calculation_period * $numberOfDaysPast * count($dateArr), 4)]);
        }
        return $payouts;
    }


    private function isWeekend($date)
    {
        $weekDay = date('w', strtotime($date));
        if ($weekDay == 0) { // Sunday
            $addDay =  1;
        } else if ($weekDay == 6) { // Saturday
            $addDay =  2;
        } else {
            $addDay = 0;
        }
        return $addDay;
    }
}
