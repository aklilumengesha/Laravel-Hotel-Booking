<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('booked_rooms', function (Blueprint $table) {
            $table->date('booking_date')->change();
        });
    }

    public function down()
    {
        Schema::table('booked_rooms', function (Blueprint $table) {
            $table->text('booking_date')->change();
        });
    }
};
