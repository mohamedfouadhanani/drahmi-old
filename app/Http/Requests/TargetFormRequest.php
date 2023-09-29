<?php

namespace App\Http\Requests;

use App\Enums\TargetCondition;
use App\Enums\TargetConditionEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class TargetFormRequest extends FormRequest
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
            "name" => ["required", "min:4"],
            "description" => ["nullable"],
            "account_id" => ["required", "exists:accounts,id"],
            "condition" => ["required", new Enum(TargetConditionEnum::class)],
            "amount" => ["required", "min:0"]
        ];
    }
}
