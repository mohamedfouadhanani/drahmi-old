<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $table = "transfers";

    protected $fillable = ["from_account_id", "to_account_id", "from_amount", "to_amount", "transaction_id"];

    public $timestamps = false;

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }

    public function from_account() {
        return $this->belongsTo(Account::class);
    }

    public function to_account() {
        return $this->belongsTo(Account::class);
    }
}
