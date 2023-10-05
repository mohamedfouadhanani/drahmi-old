<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $authorize = true;

        $request_method = $this->request->get("_method");
        if ($request_method == "PUT") {
            $authorize = $this->route("expense")->account->user_id == $this->user()->id;
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
            "amount" => ["required", "min:0"],
            "account_id" => ["required", "exists:accounts,id"],
            "category_id" => ["required", "exists:categories,id"],
            "date" => ["required"],
            "description" => ["nullable"]
        ];
    }
}
