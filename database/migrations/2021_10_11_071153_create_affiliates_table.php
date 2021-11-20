<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->integer("buyer_id");
            $table->integer("product_id");
            $table->string("product_type")->nullable();
            $table->string("product_price")->default("1");
            $table->string("product_discount")->default("0");
            $table->string("referred_by")->nullable();
            $table->string("referral_commission")->default("0");
            $table->string("bought_at")->nullable();
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
        Schema::dropIfExists('affiliates');
    }
}
