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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('date'); // Tanggal booking
            $table->enum('region', ['jakarta pusat', 'jakarta utara', 'jakarta barat', 'jakarta selatan', 'jakarta timur', 'bekasi selatan', 'bekasi barat', 'bekasi timur']);
            $table->foreignId('time_id')->constrained('times')->onDelete('cascade'); // Relasi ke times
            $table->text('address'); // alamat user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
