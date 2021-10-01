<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('uuid')->primary();

            $table->foreignId('user_id');
            $table->foreignId('priority_id');
            $table->foreignId('status_id');

            $table->boolean('is_answered')->default(0);
            $table->dateTime('overdue_at');
            $table->dateTime('reopened_at');
            $table->dateTime('closed_at');
            $table->timestamps();
            $table->ipAddress('visitor');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('priority_id')->references('id')->on('ticket_priorities');
            $table->foreign('status_id')->references('id')->on('ticket_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
