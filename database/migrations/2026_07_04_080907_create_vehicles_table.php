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
        Schema::create('vehicles', function (Blueprint $table) {

            $table->id();
            $table->string('plate_number');
            $table->string('brand');
            $table->enum('type', [
                'passenger',
                'cargo'
            ]);
            $table->enum('ownership', [
                'company',
                'rental'
            ]);
            $table->date('service_date');
            $table->enum('status', [
                'available',
                'booked',
                'in_use',
                'maintenance'
            ])
                ->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
