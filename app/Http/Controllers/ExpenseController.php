<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseFormRequest;
use App\Models\Account;
use App\Models\Category;
use App\Models\Expense;
use App\Models\Transaction;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authenticated_user_id = request()->user()->id;
        $accounts = Account::where("user_id", $authenticated_user_id)->get();

        return view("expenses.index", ["accounts" => $accounts]);
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
        
        $expense = new Expense();
        
        return view("expenses.form", ["expense" => $expense, "accounts" => $accounts, "system_categories" => $system_categories, "custom_categories" => $custom_categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseFormRequest $request)
    {
        $transaction = new Transaction();
        $transaction->date = $request->get("date");
        $transaction->description = $request->get("description");

        $transaction->save();
        
        $expense = new Expense();
        $expense->amount = $request->get("amount");
        $expense->account_id = $request->get("account_id");
        $expense->category_id = $request->get("category_id");
        $expense->transaction_id = $transaction->id;

        $expense->save();
        
        return to_route("expenses.index")->with("success", "expense created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return view("expenses.show", ["expense" => $expense]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $authenticated_user_id = request()->user()->id;

        $accounts = Account::where("user_id", $authenticated_user_id)->get();
        $system_categories = Category::whereNull("user_id")->get();
        $custom_categories = Category::where("user_id", $authenticated_user_id)->get();
        
        return view("expenses.form", ["expense" => $expense, "accounts" => $accounts, "system_categories" => $system_categories, "custom_categories" => $custom_categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseFormRequest $request, Expense $expense)
    {
        $expense->transaction->date = $request->get("date");
        $expense->transaction->description = $request->get("description");

        $expense->transaction->save();
        
        $expense->amount = $request->get("amount");
        $expense->account_id = $request->get("account_id");
        $expense->category_id = $request->get("category_id");

        $expense->save();
        
        return to_route("expenses.index")->with("success", "expense updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return to_route("expenses.index")->with("success", "expense deleted successfully");
    }
}
