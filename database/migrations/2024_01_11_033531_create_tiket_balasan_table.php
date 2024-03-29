<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket_balasan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tiket_id')->constrained('tiket');
            $table->foreignId('user_id')->constrained('users');
            $table->longText('balasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiket_balasan');
    }
};
