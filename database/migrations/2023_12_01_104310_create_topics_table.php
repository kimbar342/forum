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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->bigInteger('user_id')->unsigned();

            $table->string('title');
            $table->text('content');

            $table->timestamp('published_at')->nullable();
            $table->boolean('active')->default(true);
        });
    }

    protected array $fillable = [
        'user_id',
        'title',
        'content',
        'published_at',
        'active'
    ];
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
