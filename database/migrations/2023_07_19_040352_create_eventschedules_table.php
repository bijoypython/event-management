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
        Schema::create('eventschedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('eventname_id')->references('id')->on('eventnames')->onDelete('cascade')->onUpdate('cascade');
            $table->date('event_date');
            $table->string('title');
            $table->string('time');
            $table->string('artist_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventschedules');
    }
};
