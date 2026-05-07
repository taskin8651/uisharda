<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPagesTable extends Migration
{
    public function up()
    {
        Schema::create('job_pages', function (Blueprint $table) {
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
            $table->string('hero_tip_title')->nullable();
            $table->string('hero_tip_text')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_link')->nullable();

            $table->string('filter_title_placeholder')->nullable();
            $table->string('filter_location_placeholder')->nullable();
            $table->string('filter_button_text')->nullable();
            $table->longText('filter_chips')->nullable();

            $table->string('sidebar_badge_icon')->nullable();
            $table->string('sidebar_badge_text')->nullable();
            $table->string('sidebar_title')->nullable();
            $table->longText('sidebar_description')->nullable();
            $table->longText('sidebar_points')->nullable();
            $table->string('sidebar_button_text')->nullable();
            $table->string('sidebar_button_link')->nullable();
            $table->string('sidebar_footer_text')->nullable();

            $table->string('tips_title')->nullable();
            $table->longText('candidate_tips')->nullable();

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
        Schema::dropIfExists('job_pages');
    }
}