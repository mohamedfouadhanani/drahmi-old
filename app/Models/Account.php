<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = "accounts";

    protected $appends = ["balance"];

    protected $fillable = ["name", "description", "initial_balance", "currency_id"];

    public function currency() {
        return $this->belongsTo(Currency::class);
    }

    public function targets() {
        return $this->hasMany(Target::class);
    }

    public function incomes() {
        return $this->hasMany(Income::class);
    }

    public function expenses() {
        return $this->hasMany(Expense::class);
    }

    public function from_transfers() {
        return $this->hasMany(Transfer::class, "from_account_id");
    }

    public function to_transfers() {
        return $this->hasMany(Transfer::class, "to_account_id");
    }

    public function getBalanceAttribute() {
        $balance = $this->initial_balance;

        // incomes
        $balance = array_reduce($this->incomes->toArray(), function($carry, $item) {
            return $carry + $item["amount"];
        }, $balance);

        // expenses
        $balance = array_reduce($this->expenses->toArray(), function($carry, $item) {
            return $carry - $item["amount"];
        }, $balance);
        
        // transfers from this account
        $balance = array_reduce($this->from_transfers->toArray(), function($carry, $item) {
            return $carry - $item["from_amount"];
        }, $balance);

        // transfers to this account
        $balance = array_reduce($this->to_transfers->toArray(), function($carry, $item) {
            return $carry + $item["to_amount"];
        }, $balance);
        
        return $balance;
    }
}
