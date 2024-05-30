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
        Schema::create('gezelschap', function (Blueprint $table) {
            $table->id();
            $table->boolean('bedrijfsuitje');
            $table->boolean('gezin');
            $table->boolean('kinderen');
            $table->boolean('romantisch');
            $table->boolean('vrijgezellenfeest');
            $table->boolean('mannendag');
            $table->boolean('vriendinnendag');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gezelschap');
    }
};
