<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClaimerToFounditemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('founditems', function (Blueprint $table) {
            $table->unsignedBigInteger('claimed_by')->after('status')->nullable();

            $table->foreign('claimed_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('founditems', function (Blueprint $table) {
            $table->dropColumn('claimed_by');
        });
    }
}
