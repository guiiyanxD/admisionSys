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
        Schema::create('request_status', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_request');
            $table->unsignedBigInteger('id_status');
            $table->string('detail');
            $table->date('date');
            $table->string('registrar');

            $table->timestamps();


            $table->foreign('id_request')
                ->references('id')
                ->on('clinical_stories_request');

            $table->foreign('id_status')
                ->references('id')
                ->on('clinical_stories_request');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_status');
    }
};
