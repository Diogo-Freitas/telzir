<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_code_id');
            $table->unsignedBigInteger('destination_code_id');
            $table->unsignedDecimal('value', 10, 2);
            $table->timestamps();

            $table->foreign('source_code_id')->references('id')->on('direct_distance_dialings')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('destination_code_id')->references('id')->on('direct_distance_dialings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
};
