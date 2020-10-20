<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('file_master_id');
            $table->string('file_name');
            $table->string('file_url');
            $table->timestamps();
        });

        Schema::table('file_details', function (Blueprint $table) {
            $table->foreign('file_master_id')->references('id')->on('file_masters');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_details');
    }
}
