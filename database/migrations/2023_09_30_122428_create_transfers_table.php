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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_account_id');
            $table->unsignedBigInteger('to_account_id');
            $table->float("from_amount", 11, 2);
            $table->float("to_amount", 11, 2);
            $table->unsignedBigInteger('transaction_id');

            $table->foreign("from_account_id")->references("id")->on("accounts")->onDelete("cascade");
            $table->foreign("to_account_id")->references("id")->on("accounts")->onDelete("cascade");
            $table->foreign("transaction_id")->references("id")->on("transactions")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
