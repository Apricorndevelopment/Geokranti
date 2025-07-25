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
        Schema::create('package_profit_distributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_ulid');
            $table->unsignedBigInteger('package2_purchase_id');
            $table->decimal('purchase_amount', 12, 2);
            $table->decimal('rate_percentage', 5, 2);
            $table->decimal('distributed_amount', 12, 2);
            $table->integer('months_remaining');
            $table->date('distribution_date');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('package2_purchase_id')->references('id')->on('package2_purchases');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_profit_distributions');
    }
};
