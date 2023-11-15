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
        Schema::create('parkhistories', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_id');
            $table->string('spot_name');
            $table->string('location');
            $table->string('registration');
            $table->string('bookie_id');
            $table->enum('status', ['checked-in', 'checked-out'])->default('checked-in');
          
            $table->timestamps();
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
