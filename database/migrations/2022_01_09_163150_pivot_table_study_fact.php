<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PivotTableStudyFact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_fact', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('study_id')->integer();
            $table->unsignedBigInteger('fact_id')->integer();

            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
            $table->foreign('fact_id')->references('id')->on('facts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_fact');
    }
}
