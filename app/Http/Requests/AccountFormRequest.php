<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $authorize = true;

        $request_method = $this->request->get("_method");
        if ($request_method == "PUT") {
            $authorize = $this->route("account")->user_id == $this->user()->id;
        }

        return $authorize;
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
            "initial_balance" => ["required", "min:0"],
            "currency_id" => ["required", "exists:currencies,id"]
        ];
    }
}
