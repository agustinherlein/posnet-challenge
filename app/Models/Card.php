<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['owner_name', 'card_number', 'bank', 'limit'];
}
