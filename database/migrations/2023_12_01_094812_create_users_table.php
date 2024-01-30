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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('root')->default(0);
            $table->string('password');
            $table->rememberToken();
            $table->string('post');
            $table->string('gender');
            $table->string('city');
            $table->date('birthday');
            $table->string('familyPost');
            $table->string('position_in_office')->default('work');
            $table->float('experience')->nullable()->comment('трудовой стаж');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
