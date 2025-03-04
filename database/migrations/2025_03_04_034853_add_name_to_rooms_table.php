<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('rooms', function (Blueprint $table) {
        $table->string('name')->after('room_number');
    });
}

public function down()
{
    Schema::table('rooms', function (Blueprint $table) {
        $table->dropColumn('name');
    });
}

}
