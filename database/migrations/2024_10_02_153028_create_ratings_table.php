<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('ratings', function (Blueprint $table) {
        $table->id();
        $table->string('session_id');  // Untuk menyimpan session_id
        $table->integer('rating');     // Untuk rating
        $table->string('name');        // Nama pengguna
        $table->text('comment');       // Komentar
        $table->timestamps();          // Timestamps (created_at, updated_at)
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
