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
        Schema::create('menu3s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu2_id');
            $table->string('menu3');
            $table->string('slug')->nullable();
            $table->timestamps();

            $table->foreign("menu2_id")->references("id")->on("menu2s")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu3s');
    }
};
