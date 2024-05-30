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
        Schema::create('dagjeuits', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Standaard Naam');
            $table->date('datum');
            $table->string('titel');
            $table->timestamps();
            $table->text('beschrijving');
            $table->boolean('buiten')->default(false);
            $table->boolean('minder_validen')->default(false);
            $table->boolean('restaurant_aanwezig')->default(false);
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dagjeuits');
    }
};
