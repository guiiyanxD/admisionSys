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
        Schema::create('clinical_stories_request', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dad_name')->nullable();
            $table->string('mom_name')->nullable();
            $table->string('holder_mat');
            $table->string('beneficiary_mat')->nullable();
            $table->string('bed_number');
//            $table->date('date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinical_stories_request');
    }
};
