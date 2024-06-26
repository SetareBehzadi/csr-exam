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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('room_id')->constrained('rooms');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->bigInteger('tax')->comment('mohasebeye maliat be toman');
            $table->bigInteger('total_price')->comment('(tedade roze *gheimate otag)');
            $table->bigInteger('final_price')->comment('(tedade roze *gheimate otag)+tax - discount');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
