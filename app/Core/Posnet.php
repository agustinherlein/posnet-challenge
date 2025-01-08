<?php

namespace App\Core;

use Exception;

class Posnet
{
    // Increases the payment amount by adding interest depending on the number of payments
    public function calculateInterest($payment_amount, $payments)
    {
        return $payment_amount + $payment_amount * 0.03 * ($payments - 1);
    }

    // Processes the payment
    public function doPayment($payment_amount, $payments, $remaining_limit)
    {
        $final_amount = $this->calculateInterest($payment_amount, $payments);

        if ($final_amount > $remaining_limit) {
            throw new Exception("The limit of the card is not enough to make this payment");
        }

        return [
            'total' => $final_amount,
            'monthly_payment' => $final_amount / $payments
        ];
    }
}
