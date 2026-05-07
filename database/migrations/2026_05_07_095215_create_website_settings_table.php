<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();

            // Branding
            $table->string('site_name')->nullable();
            $table->string('site_tagline')->nullable();

            // Contact
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->longText('address')->nullable();
            $table->string('location_short')->nullable();
            $table->string('office_hours')->nullable();

            // Social
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('whatsapp_url')->nullable();

            // Topbar CTA
            $table->string('topbar_button_text')->nullable();
            $table->string('topbar_button_link')->nullable();

            // Navbar Buttons
            $table->string('nav_button_1_text')->nullable();
            $table->string('nav_button_1_link')->nullable();
            $table->string('nav_button_2_text')->nullable();
            $table->string('nav_button_2_link')->nullable();

            // Footer
            $table->longText('footer_about_text')->nullable();
            $table->string('newsletter_title')->nullable();
            $table->longText('newsletter_text')->nullable();
            $table->string('newsletter_placeholder')->nullable();
            $table->string('privacy_text')->nullable();
            $table->string('copyright_text')->nullable();

            // Map
            $table->longText('google_map_embed')->nullable();

            // Basic SEO
            $table->string('default_meta_title')->nullable();
            $table->longText('default_meta_description')->nullable();
            $table->longText('default_meta_keywords')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_settings');
    }
}