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
        Schema::create('hear_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->bigInteger('phone');
            $table->unsignedBigInteger('hear_about_options_id');
            $table->foreign('hear_about_options_id')->references('id')->on('hear_about_options');
            $table->longText('description');
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
        Schema::dropIfExists('hear_abouts');
    }
};
