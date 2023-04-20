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
        Schema::create('marks', function (Blueprint $table) {
            $table->id('entry');
            $table->unsignedBigInteger('user_id'); // Use unsignedBigInteger instead of foreign() method
            $table->foreign('user_id')->references('user_id')->on('users'); // Fix foreign key constraint
            $table->date('date');
            $table->tinyInteger('opening');
            $table->tinyInteger('assurance');
            $table->tinyInteger('apologies');
            $table->tinyInteger('resolution');
            $table->tinyInteger('querry');
            $table->tinyInteger('closing');
            $table->smallInteger('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
