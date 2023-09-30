<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "date" => ["required"],
            "description" => ["nullable"],
            "from_amount" => ["required", "min:0"],
            "to_amount" => ["required", "min:0"],
            "from_account_id" => ["required", "exists:accounts,id"],
            "to_account_id" => ["required", "exists:accounts,id", "different:from_account_id"],
        ];
    }
}
