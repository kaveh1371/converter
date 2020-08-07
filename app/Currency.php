<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getCurrencyData()
    {
        return [
            "name" => $this->name,
            "short_name" => $this->short_name,
        ];
    }
}
