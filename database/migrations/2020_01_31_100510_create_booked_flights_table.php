<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookedFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_flights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ItineraryId')->nullable();
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->string('slug')->unique();
            $table->boolean('admin')->default(false);
            $table->enum('flightStops',['direct','one','Two+'])->default('direct');
            $table->enum('flightType',['economy','business','firstClass'])->default('economy');
            $table->integer('totalCost')->nullable();
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
        Schema::dropIfExists('booked_flights');
    }
}
