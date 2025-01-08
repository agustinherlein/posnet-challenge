<?php

namespace App\Services;

use App\Models\Card;

class CardService
{

    public function create($data)
    {
        $card = new Card($data);
        $card->save();
        return $card;
    }
}
