<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('bed')->nullable()->default(null)->change();
            $table->string('bath')->nullable()->default(null)->change();
        });
    }

    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('bed')->nullable(false)->change();
            $table->string('bath')->nullable(false)->change();
        });
    }
};
