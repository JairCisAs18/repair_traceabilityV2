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
        Schema::create('PARTS_TO_REPAIR', function (Blueprint $table){
            $table->id();
            $table->foreignId('RNO_ID')->constraint('models');
            $table->foreignId('PROCESS')->constraint('processes');
            $table->string('SNA', 20); 
            $table->string('INIT_DATE', 10);
            $table->string('INIT_TIME', 10);
            $table->string('END_DATE', 10)->nullable();
            $table->string('END_TIME', 10)->nullable();
            $table->boolean('REPAIRED')->default(0);
            $table->boolean('SCRAP')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parts_to_repair');
    }
};
