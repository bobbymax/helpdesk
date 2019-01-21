<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_ticket', function (Blueprint $table) {
            $table->integer('admin_id')->unsigned();
            $table->integer('ticket_id')->unsigned();
            

            $table->foreign('ticket_id')
                  ->references('id')
                  ->on('tickets')
                  ->onDelete('cascade');

            $table->foreign('admin_id')
                  ->references('id')
                  ->on('admins')
                  ->onDelete('cascade');

            $table->primary(['admin_id', 'ticket_id']);
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
        Schema::dropIfExists('admin_ticket');
    }
}
