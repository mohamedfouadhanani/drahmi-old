<?php

namespace App\Http\Controllers;

use App\Enums\TargetConditionEnum;
use App\Http\Requests\TargetFormRequest;
use App\Models\Account;
use App\Models\Target;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authenticated_user_id = request()->user()->id;
        $accounts = Account::where("user_id", $authenticated_user_id)->get();

        return view("targets.index", ["accounts" => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authenticated_user_id = request()->user()->id;
        $accounts = Account::where("user_id", $authenticated_user_id)->get();

        $conditions = array_column(TargetConditionEnum::cases(), 'value');
        
        $target = new Target();
        $target->condition = TargetConditionEnum::EQ;
        
        return view("targets.form", ["target" => $target, "accounts" => $accounts, "conditions" => $conditions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TargetFormRequest $request)
    {
        $target = new Target();
        $target->name = $request->get("name");
        $target->description = $request->get("description");
        $target->account_id = $request->get("account_id");
        $target->amount = $request->get("amount");
        $target->condition = $request->get("condition");

        $target->save();
        
        return to_route("targets.index")->with("success", "target created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Target $target)
    {
        return view("targets.show", ["target" => $target]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Target $target)
    {
        $authenticated_user_id = request()->user()->id;
        $accounts = Account::where("user_id", $authenticated_user_id)->get();

        $conditions = array_column(TargetConditionEnum::cases(), 'value');

        return view("targets.form", ["target" => $target, "accounts" => $accounts, "conditions" => $conditions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TargetFormRequest $request, Target $target)
    {
        $target->update($request->validated());
        return to_route("targets.index")->with("success", "target updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Target $target)
    {
        $target->delete();
        return to_route("targets.index")->with("success", "target deleted successfully");
    }
}
