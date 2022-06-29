<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('route_id');
            $table->string('full_name');
            $table->string('phone');
            $table->string('email');
            $table->integer('guest_number');
            $table->dateTime('depart_datetime');
            $table->string('depart_address');
            $table->string('destination');
            $table->text('note');
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
        Schema::dropIfExists('ticket_reservations');
    }
}
