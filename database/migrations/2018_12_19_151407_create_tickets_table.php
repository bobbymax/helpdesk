<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('ticket_code')->unique();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');

            $table->integer('issue_id')->unsigned();

            $table->string('issue')->nullable();

            $table->text('complain');
            $table->string('assigned_to')->nullable();
            $table->string('priority')->default('normal');

            $table->boolean('resolved')->default(false);
            $table->boolean('reopened')->default(false);
            $table->boolean('archived')->default(false);
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
        Schema::dropIfExists('tickets');
    }
}
