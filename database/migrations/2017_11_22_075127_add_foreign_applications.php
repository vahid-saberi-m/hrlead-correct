<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('applications', function (Blueprint $table) {
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->foreign('job_post_id')->references('id')->on('JobPosts');
            $table->foreign('cv_id')->references('id')->on('cv_ids');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign(['candidate_id', 'job_pos_id', 'cv_id']);
        });

    }
}
