<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->string('report_code')->unique()->after('id');
            $table->integer('category_id')->unsigned()->after('ticket_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('assigned_to')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropForeign('reports_category_id_foreign');
            $table->dropColumn('assigned_to');
        });
    }
}
