<?php

namespace App\Services;

use App\Core\Posnet;
use App\Models\Card;

class PosnetService
{

    public function processPayment($amount, $payments, $limit)
    {
        $posnet = new Posnet();
        return $posnet->doPayment($amount, $payments, $limit);
    }
}
