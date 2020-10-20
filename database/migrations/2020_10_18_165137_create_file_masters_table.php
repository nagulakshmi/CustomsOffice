<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file_refno',200);
            $table->string('file_name');
            $table->string('file_subject');
            $table->string('file_upload');
            $table->string('assigned_to');
            $table->string('description',500)->nullable();
            $table->integer('file_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_masters');
    }
 
}