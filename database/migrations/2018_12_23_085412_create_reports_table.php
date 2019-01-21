<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned();
            $table->integer('ticket_id')->unsigned();

            $table->string('report_code')->unique();

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');

            $table->text('description');
            $table->string('assigned_to')->nullable();
            $table->boolean('archived')->default(false);
            $table->integer('reopened_count')->default(0);
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
        Schema::dropIfExists('reports');
    }
}
