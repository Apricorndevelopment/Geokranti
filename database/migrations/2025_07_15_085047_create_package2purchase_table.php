<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('package2_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('ulid'); // store user's ULID separately if needed
            $table->foreignId('package2_id')->constrained('package2')->onDelete('cascade');
            $table->unsignedBigInteger('package2_detail_id'); // store selected rate option
            $table->string('package_name');
            $table->integer('quantity');
            $table->decimal('rate', 8, 2);
            $table->string('capital');
            $table->string('time')->nullable();
            $table->string('profit_share')->nullable();
            $table->date('purchased_at');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package1purchase');
    }
};
