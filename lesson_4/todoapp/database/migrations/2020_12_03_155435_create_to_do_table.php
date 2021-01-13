<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToDoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_do', function (Blueprint $table) {
            $table->id();

            $table->string("title", 190);
            $table->text("description");
            $table->unsignedInteger("priority");
            $table->integer("progress")->default(0);
            $table->dateTime("deadline")->nullable();
            $table->unsignedBigInteger("parent_id")->nullable();
            $table->unsignedBigInteger("file_id")->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent_id')->references('id')->on('to_do');
            $table->foreign('file_id')->references('id')->on('file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to_do');
    }
}
