<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNullColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->getChangedColumns('date_of_birth');
            $table->getChangedColumns('gender');
            $table->getChangedColumns('address');
            $table->getChangedColumns('phone');
            $table->getChangedColumns('email');
        });
    }
}
