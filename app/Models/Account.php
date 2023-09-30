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
}
