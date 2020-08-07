<?php

namespace App\Http\Requests;

use App\Order\DataContracts\OrderDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'from_currency_amount' => 'required|numeric|max:9999999999999',
            'from_currency_id' => 'required|exists:currencies,id',
            'to_currency_id' => 'required|exists:currencies,id',
        ];
    }

    /**
     * @return OrderDTO
     */
    public function getDTO()
    {
        $DTO = new OrderDTO();
        $DTO->email = $this->get("email");
        $DTO->fromCurrencyAmount = $this->get("from_currency_amount");
        $DTO->fromCurrencyId = $this->get("from_currency_id");
        $DTO->toCurrencyId = $this->get("to_currency_id");
        return $DTO;
    }
}
