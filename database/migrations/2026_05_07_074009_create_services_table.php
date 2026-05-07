<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string('icon')->nullable();
            $table->string('tag')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}