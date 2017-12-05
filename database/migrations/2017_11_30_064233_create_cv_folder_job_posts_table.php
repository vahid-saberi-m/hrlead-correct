<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvFolderJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_folder_job_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_post_id');
            $table->unsignedInteger('cv_folder_id');
            $table->timestamps();
            $table->foreign('cv_folder_id')->references('id')->on('cv_folders');
            $table->foreign('job_post_id')->references('id')->on('JobPosts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cv_folder_job_posts');
    }
}
