<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 40);
            $table->string('apellidos',40);
            $table->text('asunto');
            $table->string('correo');
            $table->string('telefono');
            $table->date('fecha_seguim_actual')->nullable();
            $table->integer('num_dias');
            $table->date('fecha_prox_seguim')->nullable();
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
        Schema::dropIfExists('seguimientos');
    }
}
