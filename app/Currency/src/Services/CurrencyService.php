<?php


namespace App\Currency\Services;


use App\Currency;
use App\Currency\DataContracts\CurrencyDTO;

class CurrencyService
{
    public function getList()
    {
        $currencies = Currency::get();
        $list = [];
        foreach ($currencies as $currency) {
            $list[] = [
                "id" => $currency->getAttributes()['id'],
                "name" => $currency->name,
                "shirt_name" => $currency->short_name,
            ];
        }

        return $list;
    }
}
