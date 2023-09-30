<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferFormRequest;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\Transfer;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authenticated_user_id = request()->user()->id;
        $accounts = Account::where("user_id", $authenticated_user_id)->get();

        return view("transfers.index", ["accounts" => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authenticated_user_id = request()->user()->id;
        $accounts = Account::where("user_id", $authenticated_user_id)->get();
        
        $transfer = new Transfer();
        return view("transfers.form", ["transfer" => $transfer, "accounts" => $accounts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransferFormRequest $request)
    {
        $transaction = new Transaction();
        $transaction->date = $request->get("date");
        $transaction->description = $request->get("description");

        $transaction->save();
        
        $transfer = new Transfer();
        $transfer->from_account_id = $request->get("from_account_id");
        $transfer->to_account_id = $request->get("to_account_id");
        $transfer->from_amount = $request->get("from_amount");
        $transfer->to_amount = $request->get("to_amount");
        $transfer->transaction_id = $transaction->id;

        $transfer->save();
        
        return to_route("transfers.index")->with("success", "transfer created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Transfer $transfer)
    {
        return view("transfers.show", ["transfer" => $transfer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transfer $transfer)
    {
        $authenticated_user_id = request()->user()->id;
        $accounts = Account::where("user_id", $authenticated_user_id)->get();
        
        return view("transfers.form", ["transfer" => $transfer, "accounts" => $accounts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransferFormRequest $request, Transfer $transfer)
    {
        $transfer->transaction->date = $request->get("date");
        $transfer->transaction->description = $request->get("description");

        $transfer->transaction->save();
        
        $transfer->from_account_id = $request->get("from_account_id");
        $transfer->to_account_id = $request->get("to_account_id");
        $transfer->from_amount = $request->get("from_amount");
        $transfer->to_amount = $request->get("to_amount");

        $transfer->save();
        
        return to_route("transfers.index")->with("success", "transfer updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transfer $transfer)
    {
        $transfer->delete();
        return to_route("transfers.index")->with("success", "transfer deleted successfully");
    }
}
