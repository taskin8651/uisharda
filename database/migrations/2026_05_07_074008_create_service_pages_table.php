<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePagesTable extends Migration
{
    public function up()
    {
        Schema::create('service_pages', function (Blueprint $table) {
            $table->id();

            $table->string('hero_badge_icon')->nullable();
            $table->string('hero_badge_text')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_highlight')->nullable();
            $table->longText('hero_description')->nullable();
            $table->string('hero_breadcrumb_title')->nullable();

            $table->string('hero_card_title')->nullable();
            $table->string('hero_card_subtitle')->nullable();
            $table->string('hero_stat_1_value')->nullable();
            $table->string('hero_stat_1_label')->nullable();
            $table->string('hero_stat_2_value')->nullable();
            $table->string('hero_stat_2_label')->nullable();
            $table->string('hero_support_title')->nullable();
            $table->string('hero_support_text')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_link')->nullable();

            $table->string('featured_badge_icon')->nullable();
            $table->string('featured_badge_text')->nullable();
            $table->string('featured_title')->nullable();
            $table->longText('featured_description')->nullable();
            $table->string('featured_button_1_text')->nullable();
            $table->string('featured_button_1_link')->nullable();
            $table->string('featured_button_2_text')->nullable();
            $table->string('featured_button_2_link')->nullable();

            $table->string('featured_stat_1_value')->nullable();
            $table->string('featured_stat_1_label')->nullable();
            $table->string('featured_stat_2_value')->nullable();
            $table->string('featured_stat_2_label')->nullable();
            $table->string('featured_stat_3_value')->nullable();
            $table->string('featured_stat_3_label')->nullable();

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
        Schema::dropIfExists('service_pages');
    }
}