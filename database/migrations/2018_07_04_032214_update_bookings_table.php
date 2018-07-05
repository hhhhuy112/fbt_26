<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->float('grand_total')->unsigned()->change();
            $table->dropColumn('status');
            $table->boolean('is_canceled')->after('grand_total');
        });
    }

    /**
     * Reverse the migrations.
     *
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->getChangedColumns('grand_total');
            $table->addColumn('string', 'status');
            $table->dropColumn('is_canceled');
        });
    }
}
