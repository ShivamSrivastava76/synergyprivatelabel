<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('add_to_cards', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 45);
            $table->unsignedBigInteger('products_id');
            $table->foreign('products_id')->references('id')->on('products');
            $table->string('Key');
            $table->string('value');
            $table->string('indices')->nullable();
            $table->string('custom')->nullable();
            $table->tinyInteger('status')->comment("0 => active, 1 => inactive");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_to_cards');
    }
};
