<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('contact_inquiries', function (Blueprint $table) {
            $table->id();

            $table->string('full_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->string('user_type')->nullable();
            $table->string('preferred_location')->nullable();
            $table->string('industry')->nullable();
            $table->longText('message')->nullable();

            $table->string('resume')->nullable();

            $table->string('status')->default('new');
            $table->longText('admin_note')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_inquiries');
    }
}