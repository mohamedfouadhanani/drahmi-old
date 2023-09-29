<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountFormRequest;
use App\Models\Account;
use App\Models\Currency;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authenticated_user_id = request()->user()->id;
        $accounts = Account::where("user_id", $authenticated_user_id)->get();

        return view("accounts.index", ["accounts" => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currencies = Currency::all();
        
        $account = new Account();
        return view("accounts.form", ["account" => $account, "currencies" => $currencies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountFormRequest $request)
    {
        $account = new Account();
        $account->name = $request->get("name");
        $account->description = $request->get("description");
        $account->initial_balance = $request->get("initial_balance");
        $account->currency_id = $request->get("currency_id");
        $account->user_id = $request->user()->id;

        $account->save();
        
        return to_route("accounts.index")->with("success", "account created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        return view("accounts.show", ["account" => $account]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        $currencies = Currency::all();
        return view("accounts.form", ["account" => $account, "currencies" => $currencies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountFormRequest $request, Account $account)
    {
        $account->update($request->validated());
        return to_route("accounts.index")->with("success", "account updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return to_route("accounts.index")->with("success", "account deleted successfully");
    }
}
