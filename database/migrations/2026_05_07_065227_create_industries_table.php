<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustriesTable extends Migration
{
    public function up()
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->id();

            // Grid Card
            $table->string('icon')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();

            // Detail Block
            $table->string('detail_badge_icon')->nullable();
            $table->string('detail_badge_text')->nullable();
            $table->string('detail_chip_icon')->nullable();
            $table->string('detail_chip_text')->nullable();
            $table->string('detail_title')->nullable();
            $table->longText('detail_description')->nullable();

            // Buttons
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('job_button_text')->nullable();
            $table->string('job_button_link')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('is_special')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('industries');
    }
}