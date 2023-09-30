<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = "accounts";

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
}
