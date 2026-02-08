<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Get database driver
        $driver = DB::connection()->getDriverName();
        
        // First, clean up any non-numeric data in these columns
        if ($driver === 'pgsql') {
            // PostgreSQL syntax
            DB::statement("UPDATE rooms SET total_guests = NULL WHERE total_guests IS NOT NULL AND total_guests !~ '^[0-9]+$'");
            DB::statement("UPDATE rooms SET total_rooms = NULL WHERE total_rooms IS NOT NULL AND total_rooms !~ '^[0-9]+$'");
            DB::statement("UPDATE rooms SET price = '0' WHERE price IS NOT NULL AND price !~ '^[0-9.]+$'");
        } else {
            // MySQL syntax
            DB::statement("UPDATE rooms SET total_guests = NULL WHERE total_guests IS NOT NULL AND total_guests NOT REGEXP '^[0-9]+$'");
            DB::statement("UPDATE rooms SET total_rooms = NULL WHERE total_rooms IS NOT NULL AND total_rooms NOT REGEXP '^[0-9]+$'");
            DB::statement("UPDATE rooms SET price = 0 WHERE price IS NOT NULL AND price NOT REGEXP '^[0-9.]+$'");
        }
        
        // Set default values for NULL entries
        DB::statement("UPDATE rooms SET total_guests = '2' WHERE total_guests IS NULL OR total_guests = ''");
        DB::statement("UPDATE rooms SET total_rooms = '1' WHERE total_rooms IS NULL OR total_rooms = ''");
        DB::statement("UPDATE rooms SET price = '0' WHERE price IS NULL OR price = ''");

        Schema::table('rooms', function (Blueprint $table) {
            $table->integer('total_rooms')->default(1)->change();
            $table->integer('total_guests')->default(2)->nullable()->change();
            $table->decimal('price', 10, 2)->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->text('total_rooms')->change();
            $table->text('total_guests')->change();
            $table->text('price')->change();
        });
    }
};
