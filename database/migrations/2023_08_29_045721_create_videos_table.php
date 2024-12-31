<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('poster')->nullable();
            $table->string('filename')->nullable();
            $table->double('duration')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->integer('sequence');
            $table->boolean('visibility')->default(true);
            $table->unsignedBigInteger('uploaded_by');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('uploaded_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
