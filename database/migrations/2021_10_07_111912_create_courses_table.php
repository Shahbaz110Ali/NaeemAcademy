<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->longText("title")->nullable();
            $table->longText("description")->nullable();
            $table->longText("type")->nullable();
            $table->longText("course_image")->nullable();
            $table->longText("price")->nullable();
            $table->longText("discount")->default("0");
            $table->longText("creator")->nullable();
            $table->longText("creator_image")->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('courses');
    }
}
