<?php

namespace App\Http\Controllers;

use App\Core\Posnet;
use App\Models\Card;
use App\Services\PosnetService;
use Exception;
use Illuminate\Http\Request;

class PosnetController extends BaseApiController
{
    protected PosnetService $posnetService;

    public function __construct(PosnetService $posnetService)
    {
        $this->posnetService = $posnetService;
    }

    public function payment(Request $request)
    {
        try {
            $data = $request->all();
            $card = Card::where('card_number', $data['card_number'])->first();

            if (!$card) {
                throw new Exception("No card was found with the number " . $data['card_number']);
            }

            $payment_data = $this->posnetService->processPayment($data['amount'], $data['payments'], $card->limit);

            $ticket_data = [
                'name' => $card->owner_name,
                ...$payment_data
            ];

            return $this->sendResponse($ticket_data, "Payment processed successfully");
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 500);
        }
    }
}
