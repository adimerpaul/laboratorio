<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seriados', function (Blueprint $table) {
            $table->id();
            $table->string('requerido')->default('')->nullable();
            $table->string('tipomuestra')->default('')->nullable();
            $table->string('muestra1')->default('')->nullable();
            $table->date('fecha1')->nullable();
            $table->time('hora1')->nullable();
            $table->string('d1')->default('')->nullable();
            $table->string('muestra2')->default('')->nullable();
            $table->date('fecha2')->nullable();
            $table->time('hora2')->nullable();
            $table->string('d2')->default('')->nullable();
            $table->string('muestra3')->default('')->nullable();
            $table->date('fecha3')->nullable();
            $table->time('hora3')->nullable();
            $table->string('d3')->default('')->nullable();
            $table->string('observaciones')->default('')->nullable();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('seriados');
    }
}
