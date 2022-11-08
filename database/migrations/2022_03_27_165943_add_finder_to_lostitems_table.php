<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFinderToLostitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lostitems', function (Blueprint $table) {
            $table->unsignedBigInteger('finder')->after('status')->nullable();

            $table->foreign('finder')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lostitems', function (Blueprint $table) {
            $table->dropColumn('finder');
        });
    }
}
