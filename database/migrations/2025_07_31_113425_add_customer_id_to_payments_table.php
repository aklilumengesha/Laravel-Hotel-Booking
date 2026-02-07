<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Drop the foreign key and user_id column
            if (Schema::hasColumn('payments', 'user_id')) {
                $table->dropForeign(['user_id']); // drop foreign key
                $table->dropColumn('user_id');     // drop column
            }

            // Add customer_id with foreign key
            $table->foreignId('customer_id')->after('room_id')->constrained('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Drop customer_id foreign key and column
            if (Schema::hasColumn('payments', 'customer_id')) {
                $table->dropForeign(['customer_id']);
                $table->dropColumn('customer_id');
            }

            // Re-add user_id (optional, in case you want to rollback)
            $table->foreignId('user_id')->after('room_id')->constrained('users')->onDelete('cascade');
        });
    }
};
