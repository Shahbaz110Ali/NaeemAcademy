<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('duration')->nullable();
            $table->string('max_marks')->default("100");
            $table->string('min_marks')->default("0");
            $table->string('negative_marks')->default("0");
            $table->integer('total_options')->default(4);
            $table->integer('question_per_page')->default(1);
            $table->string('type')->default("practice");
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
