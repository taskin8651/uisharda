<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceFeaturePointsTable extends Migration
{
    public function up()
    {
        Schema::create('service_feature_points', function (Blueprint $table) {
            $table->id();

            $table->string('icon')->nullable();
            $table->string('title')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_feature_points');
    }
}