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
        Schema::create('enquiry_emails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquiries_id');
            $table->foreign('enquiries_id')->references('id')->on('enquiries');
            $table->unsignedBigInteger('emails_id');
            $table->foreign('emails_id')->references('id')->on('emails');
            $table->tinyInteger('status')->comment("0 => active, 1 => inactive");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiry_emails');
    }
};
