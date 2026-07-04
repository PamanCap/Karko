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
        Schema::create('fuel_logs', function (Blueprint $table) {

            $table->id();
            $table->foreignId('vehicle_id')
                ->constrained();
            $table->date('date');
            $table->integer('liter');
            $table->integer('cost');
            $table->string('receipt_image')
                ->nullable();
            $table->foreignId('created_by')
                ->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_logs');
    }
};
