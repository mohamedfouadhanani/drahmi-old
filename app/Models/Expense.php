<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = "expenses";

    protected $fillable = ["amount", "account_id", "category_id"];

    public $timestamps = false;

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }

    public function account() {
        return $this->belongsTo(Account::class);
    }
    
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
