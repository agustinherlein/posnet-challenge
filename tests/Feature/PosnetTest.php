<?php

namespace Tests\Feature;

use App\Core\Posnet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertIsNumeric;

class PosnetTest extends TestCase
{
    public function test_posnet_can_process_a_payment()
    {
        $posnet = new Posnet;
        $amount = 100000;
        $payments = 6;
        $remaining_limit = 300000;
        $final_amount = $posnet->doPayment($amount, $payments, $remaining_limit);
        assertIsNumeric($final_amount);
    }
}
