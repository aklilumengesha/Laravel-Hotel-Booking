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
    Schema::table('booked_rooms', function (Blueprint $table) {
        $table->unsignedBigInteger('customer_id')->nullable()->after('room_id');

        $table->date('check_in_date')->after('room_id');
        $table->date('check_out_date')->after('check_in_date');

        $table->integer('adults')->default(1);
        $table->integer('children')->default(0);
        $table->integer('total_guests')->default(1);

        $table->decimal('price_per_night', 10, 2)->default(0);
        $table->decimal('total_price', 10, 2)->default(0);

        $table->enum('payment_type', ['deposit', 'full'])->default('full');
        $table->decimal('paid_amount', 10, 2)->default(0);

        $table->enum('status', [
            'pending',
            'confirmed',
            'cancelled',
            'completed'
        ])->default('pending');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
