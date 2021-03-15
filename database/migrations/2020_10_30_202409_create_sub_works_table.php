<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_works', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedbigInteger('work_id');
            $table->string('title')->nullable();
            $table->text('disc')->nullable();
            $table->string('img')->nullable();
            $table->string('vid')->nullable();
            $table->timestamps();
            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_works');
    }
}
