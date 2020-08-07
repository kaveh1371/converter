<?php


namespace App\Order\DataContracts;


class OrderDTO
{
    public $id;
    public $email;
    public $fromCurrencyAmount;
    public $fromCurrencyId;
    public $toCurrencyId;
    public $result;
}
