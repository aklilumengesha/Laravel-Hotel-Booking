<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        $driver = DB::connection()->getDriverName();
        
        if ($driver === 'pgsql') {
            // PostgreSQL requires explicit casting
            DB::statement("ALTER TABLE booked_rooms ALTER COLUMN booking_date TYPE DATE USING booking_date::date");
        } else {
            // MySQL
            Schema::table('booked_rooms', function (Blueprint $table) {
                $table->date('booking_date')->change();
            });
        }
    }

    public function down()
    {
        $driver = DB::connection()->getDriverName();
        
        if ($driver === 'pgsql') {
            DB::statement("ALTER TABLE booked_rooms ALTER COLUMN booking_date TYPE TEXT");
        } else {
            Schema::table('booked_rooms', function (Blueprint $table) {
                $table->text('booking_date')->change();
            });
        }
    }
};
