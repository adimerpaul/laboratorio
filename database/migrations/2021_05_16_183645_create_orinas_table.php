<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orinas', function (Blueprint $table) {
            $table->id();
            $table->string('requerido');
            $table->string('tipomuestra');
            $table->date('fechatoma');
            $table->string('d1');
            $table->string('d2');
            $table->string('d3');
            $table->string('d4');
            $table->string('d5');
            $table->string('d6');
            $table->string('d7');
            $table->string('d8');
            $table->string('d9');
            $table->string('d10');
            $table->string('d11');
            $table->string('d12');
            $table->string('d13');
            $table->string('d14');
            $table->string('d15');
            $table->string('d16');
            $table->string('d17');
            $table->string('d18');
            $table->string('d19');
            $table->string('d20');
            $table->string('d21');
            $table->string('d22');
            $table->string('d23');
            $table->string('d24');
            $table->string('d25');
            $table->string('d26');
            $table->string('d27');
            $table->string('d28');
            $table->string('d29');
            $table->string('d30');
            $table->string('d31');
            $table->string('d32');
            $table->string('d33');
            $table->string('d34');
            $table->string('d35');
            $table->string('d36');
            $table->string('d37');
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
        Schema::dropIfExists('orinas');
    }
}
