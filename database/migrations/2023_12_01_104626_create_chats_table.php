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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_send_id')->constrained('users');
            $table->bigInteger('user_abon_id');
            $table->tinyInteger('id_read')->default(0);
            $table->text('comment');
            $table->dateTime('time_send');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
