<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomeFormRequest;
use App\Models\Account;
use App\Models\Category;
use App\Models\Income;
use App\Models\Transaction;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authenticated_user_id = request()->user()->id;
        $accounts = Account::where("user_id", $authenticated_user_id)->get();

        return view("incomes.index", ["accounts" => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authenticated_user_id = request()->user()->id;

        $accounts = Account::where("user_id", $authenticated_user_id)->get();
        $system_categories = Category::whereNull("user_id")->get();
        $custom_categories = Category::where("user_id", $authenticated_user_id)->get();
        
        $income = new Income();
        return view("incomes.form", ["income" => $income, "accounts" => $accounts, "system_categories" => $system_categories, "custom_categories" => $custom_categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IncomeFormRequest $request)
    {
        $transaction = new Transaction();
        $transaction->date = $request->get("date");
        $transaction->description = $request->get("description");

        $transaction->save();
        
        $income = new Income();
        $income->amount = $request->get("amount");
        $income->account_id = $request->get("account_id");
        $income->category_id = $request->get("category_id");
        $income->transaction_id = $transaction->id;

        $income->save();
        
        return to_route("incomes.index")->with("success", "income created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        return view("incomes.show", ["income" => $income]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        $authenticated_user_id = request()->user()->id;

        $accounts = Account::where("user_id", $authenticated_user_id)->get();
        $system_categories = Category::whereNull("user_id")->get();
        $custom_categories = Category::where("user_id", $authenticated_user_id)->get();
        
        return view("incomes.form", ["income" => $income, "accounts" => $accounts, "system_categories" => $system_categories, "custom_categories" => $custom_categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IncomeFormRequest $request, Income $income)
    {
        $income->transaction->date = $request->get("date");
        $income->transaction->description = $request->get("description");

        $income->transaction->save();
        
        $income->amount = $request->get("amount");
        $income->account_id = $request->get("account_id");
        $income->category_id = $request->get("category_id");

        $income->save();
        
        return to_route("incomes.index")->with("success", "income updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        $income->delete();
        return to_route("incomes.index")->with("success", "income deleted successfully");
    }
}
