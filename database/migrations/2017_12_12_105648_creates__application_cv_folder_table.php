<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatesApplicationCvFolderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_cv_folders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('application_id');
            $table->foreign('application_id')->references('id')->on('applications');
            $table->unsignedInteger('cv_folder_id');
            $table->foreign('cv_folder_id')->references('id')->on('cv_folders');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_cv_folders');
    }
}
