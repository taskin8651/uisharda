<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            $table->string('job_type_icon')->nullable();
            $table->string('job_type')->nullable();
            $table->string('location')->nullable();

            $table->string('title')->nullable();
            $table->string('industry')->nullable();
            $table->string('experience')->nullable();
            $table->string('skills')->nullable();
            $table->string('salary')->nullable();
            $table->string('posted_text')->nullable();

            $table->longText('responsibilities')->nullable();
            $table->longText('requirements')->nullable();

            $table->string('apply_button_text')->nullable();
            $table->string('apply_link')->nullable();

            $table->string('how_to_apply_title')->nullable();
            $table->longText('how_to_apply_text')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}