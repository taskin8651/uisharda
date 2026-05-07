<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutPagesTable extends Migration
{
    public function up()
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();

            // Story Section
            $table->string('story_kicker')->nullable();
            $table->string('story_title')->nullable();
            $table->string('story_highlight')->nullable();
            $table->longText('story_description')->nullable();

            // Mission Vision Panel
            $table->string('panel_title')->nullable();
            $table->string('panel_subtitle')->nullable();
            $table->string('panel_badge')->nullable();

            $table->string('mission_title')->nullable();
            $table->longText('mission_description')->nullable();

            $table->string('vision_title')->nullable();
            $table->longText('vision_description')->nullable();

            // Values Section
            $table->string('values_kicker')->nullable();
            $table->string('values_title')->nullable();
            $table->longText('values_description')->nullable();

            // Process Section
            $table->string('process_kicker')->nullable();
            $table->string('process_title')->nullable();
            $table->longText('process_description')->nullable();

            // CTA Section
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
        Schema::dropIfExists('about_pages');
    }
}