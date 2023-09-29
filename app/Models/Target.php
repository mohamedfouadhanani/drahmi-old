<?php

namespace App\Models;

use App\Enums\TargetConditionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $table = "targets";

    protected $fillable = ["name", "description", "account_id", "amount", "condition"];

    protected $casts = [
        'condition' => TargetConditionEnum::class,
     ];

    public function account() {
        return $this->belongsTo(Account::class);
    }

    public function is_reached() {
        // 
    }
}
