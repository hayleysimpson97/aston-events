<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('description')->nullable(false);
            $table->dateTime('date')->nullable(false);
            $table->unsignedBigInteger('organiser_id')->nullable(false);
            $table->string('location')->nullable(false);
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->string('picture')->nullable(false);
            $table->integer('interest_ranking')->nullable(false);
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
        Schema::dropIfExists('events');
    }
}
