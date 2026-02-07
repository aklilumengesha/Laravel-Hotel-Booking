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
    Schema::create('about_pages', function (Blueprint $table) {
        $table->id();
        $table->string('heading');
        $table->text('description');
        $table->string('image')->nullable();
        $table->json('improvements')->nullable(); // Store as array
        $table->json('awards')->nullable();       // Store as array
        $table->boolean('status')->default(true);
        $table->timestamps();
    });
}




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_pages');
    }
};
