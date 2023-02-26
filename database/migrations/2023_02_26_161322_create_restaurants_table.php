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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('opening');
            $table->string('dayoff');
            $table->string('tel');
            $table->integer('parking');
            $table->string('website');
            $table->dateTime('updated_at');
            $table->dateTime('created_at');
            $table->integer('deleted_at')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
