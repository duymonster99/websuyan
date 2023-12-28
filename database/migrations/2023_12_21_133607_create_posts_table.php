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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stt')->nullable();
            $table->unsignedBigInteger('menu1_id');
            $table->unsignedBigInteger('menu2_id')->nullable();
            $table->unsignedBigInteger('menu3_id')->nullable();
            $table->text('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('content1')->nullable();
            $table->text('content2')->nullable();
            $table->text('content3')->nullable();
            $table->string('image')->nullable();
            $table->string('status_home')->nullable();
            $table->string('status_page')->nullable();
            $table->timestamps();

            $table->foreign("menu1_id")->references("id")->on("menu1s")->onDelete("cascade");
            $table->foreign("menu2_id")->references("id")->on("menu2s")->onDelete("cascade");
            $table->foreign("menu3_id")->references("id")->on("menu3s")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
