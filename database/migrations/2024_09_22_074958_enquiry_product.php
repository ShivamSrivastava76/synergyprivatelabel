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
        Schema::create('enquiry_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquiries_id');
            $table->foreign('enquiries_id')->references('id')->on('enquiries');
            $table->unsignedBigInteger('products_id');
            $table->foreign('products_id')->references('id')->on('products');
            $table->tinyInteger('customiable')->comment("0 => Yes, 1 => No");
            $table->string('formula')->nullable();
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
        //
    }
};
