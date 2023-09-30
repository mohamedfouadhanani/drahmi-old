<?php

namespace App\Models;

use App\Enums\TargetConditionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $table = "targets";

    protected $appends = ["is_reached"];
    
    protected $fillable = ["name", "description", "account_id", "amount", "condition"];

    protected $casts = [
        'condition' => TargetConditionEnum::class,
     ];

    public function account() {
        return $this->belongsTo(Account::class);
    }

    public function getIsReachedAttribute() {
        $accounts_balance = $this->account->balance;
        $targets_condition_operation = $this->condition->operation();
        $targets_amount = $this->amount;

        $expression = "$accounts_balance $targets_condition_operation $targets_amount";
        $result = eval("return $expression;");
        return $result;
    }
}
