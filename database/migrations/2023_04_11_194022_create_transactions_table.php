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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_id');
            $table->foreign('from_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('to_id');
            $table->foreign('to_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->decimal('amount', 12, 2);
            $table->string('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
