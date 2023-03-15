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
        Schema::create('_order_items', function (Blueprint $table) {
            $table->id();
            $table->decimal("price");
            $table->integer("quantity");
            $table->timestamps();
            $table->foreignId('order_id')
            ->constrained('orders');
            $table->foreignId('book_id')
            ->constrained('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_order_items');
    }
};
