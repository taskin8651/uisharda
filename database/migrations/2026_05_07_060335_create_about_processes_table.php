<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutProcessesTable extends Migration
{
    public function up()
    {
        Schema::create('about_processes', function (Blueprint $table) {
            $table->id();

            $table->string('icon')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_processes');
    }
}