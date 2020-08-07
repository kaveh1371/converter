<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function fromCurrency()
    {
        return $this->belongsTo(Currency::class, "from_currency_id", "id");
    }
    public function toCurrency()
    {
        return $this->belongsTo(Currency::class, "to_currency_id", "id");
    }
}
