<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserologias', function (Blueprint $table) {
            $table->id();
            $table->string('requerido')->default('')->nullable();
            $table->string('tipomuestra')->default('')->nullable();
            $table->date('fechatoma')->nullable();
            $table->date('fechaentrega')->nullable();
            $table->string('d1')->default('')->nullable();
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
        Schema::dropIfExists('reserologias');
    }
}