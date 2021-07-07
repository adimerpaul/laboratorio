<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUretralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uretrals', function (Blueprint $table) {
            $table->id();
            $table->string('requerido')->default('')->nullable();
            $table->string('tipomuestra')->default('')->nullable();
            $table->date('fechatoma')->nullable();
            $table->string('d1')->default('')->nullable();
            $table->string('d2')->default('')->nullable();
            $table->string('d3')->default('')->nullable();
            $table->string('d4')->default('')->nullable();
            $table->string('d5')->default('')->nullable();
            $table->string('d6')->default('')->nullable();
            $table->string('d7')->default('')->nullable();
            $table->string('d8')->default('')->nullable();
            $table->string('d9')->default('')->nullable();
            $table->string('d10')->default('')->nullable();
            $table->string('d11')->default('')->nullable();
            $table->string('d12')->default('')->nullable();
            $table->string('d13')->default('')->nullable();
            $table->string('d14')->default('')->nullable();
            $table->string('d15')->default('')->nullable();
            $table->string('d16')->default('')->nullable();
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
        Schema::dropIfExists('uretrals');
    }
}
