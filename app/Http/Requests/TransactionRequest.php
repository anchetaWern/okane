<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'transaction_datetime' => 'required|date',
            'user_category_id' => 'required|integer',
            'transaction_type' => 'required|in:income,expense,donation,investment,fund_transfer',
            'summary' => 'required',
            'source_user_fund_id' => 'required|integer',
            'destination_user_fund_id' => 'nullable',
            'amount' => 'required|numeric',
            'transfer_fee' => 'nullable',
            'notes' => 'nullable',
        ];
    }
}
