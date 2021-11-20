<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_requests', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("course_id");
            $table->string("payment_method")->nullable();
            $table->string("payment_date")->nullable();
            $table->string("amount_paid")->nullable();
            $table->string("image_proof")->nullable();
            $table->integer("status")->default(0);
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
        Schema::dropIfExists('buy_requests');
    }
}
