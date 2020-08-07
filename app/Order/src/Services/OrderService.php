<?php


namespace App\Order\Services;


use App\Currency;
use App\Order;
use App\Order\DataContracts\OrderDTO;
use Ramsey\Uuid\Rfc4122\UuidV5;

class OrderService
{
    private $id;
    private $email;
    private $fromCurrencyAmount;
    private $fromCurrencyId;
    private $toCurrencyId;

    /**
     * OrderService constructor.
     * @param OrderDTO $DTO
     */
    public function __construct(OrderDTO $DTO)
    {
        $this->id = $DTO->id;
        $this->email = $DTO->email;
        $this->fromCurrencyAmount = $DTO->fromCurrencyAmount;
        $this->fromCurrencyId = $DTO->fromCurrencyId;
        $this->toCurrencyId = $DTO->toCurrencyId;
    }

    public function storeOrder()
    {
        $order = new Order();
        $uuid = UuidV5::uuid4()->toString();
        $order->id = $uuid;
        $order->email = $this->email;
        $order->from_currency_amount = $this->fromCurrencyAmount;
        $order->from_currency_id = $this->fromCurrencyId;
        $order->to_currency_id = $this->toCurrencyId;
        $order->result = $this->getConvertedAmount();
        $order->save();

        $DTO = new OrderDTO();
        $DTO->id = $uuid;
        $DTO->email = $order->email;
        $DTO->fromCurrencyAmount = $order->from_currency_amount;
        $DTO->fromCurrencyId = $order->from_currency_id;
        $DTO->toCurrencyId = $order->to_currency_id;
        $DTO->result = $order->result;

        return $DTO;
    }

    private function getConvertedAmount()
    {
        $fromRatioToRial = Currency::findOrFail($this->fromCurrencyId)->ratio_to_rial;
        $toRatioToRial = Currency::findOrFail($this->toCurrencyId)->ratio_to_rial;
        $toToFromRatio = $fromRatioToRial / $toRatioToRial;

        return $toToFromRatio * $this->fromCurrencyAmount;
    }
}
