<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_tecnicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orden_de__trabajo_id')->constrained('orden_de__trabajos')->onDelete('cascade');
            $table->foreignId('tecnico_id')->constrained('tecnicos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_tecnicos');
    }
};