<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustryPagesTable extends Migration
{
    public function up()
    {
        Schema::create('industry_pages', function (Blueprint $table) {
            $table->id();

            $table->string('grid_eyebrow')->nullable();
            $table->string('grid_title')->nullable();
            $table->longText('grid_description')->nullable();
            $table->string('grid_button_1_text')->nullable();
            $table->string('grid_button_1_link')->nullable();
            $table->string('grid_button_2_text')->nullable();
            $table->string('grid_button_2_link')->nullable();

            $table->string('detail_eyebrow')->nullable();
            $table->string('detail_title')->nullable();
            $table->longText('detail_description')->nullable();

            $table->string('process_eyebrow')->nullable();
            $table->string('process_title')->nullable();
            $table->longText('process_description')->nullable();

            $table->string('cta_title')->nullable();
            $table->longText('cta_description')->nullable();
            $table->string('cta_button_1_text')->nullable();
            $table->string('cta_button_1_link')->nullable();
            $table->string('cta_button_2_text')->nullable();
            $table->string('cta_button_2_link')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('industry_pages');
    }
}