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
        Schema::create('out_stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('shelf_id');
            $table->integer('product_id');
            $table->integer('user_id'); // who assigned
            $table->integer('quantity');
            $table->string('assigned_to');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('out_stocks');
    }
};
