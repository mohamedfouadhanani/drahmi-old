<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->float("amount", 11, 2);
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('transaction_id');

            $table->foreign("account_id")->references("id")->on("accounts")->onDelete("cascade");
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
            $table->foreign("transaction_id")->references("id")->on("transactions")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
