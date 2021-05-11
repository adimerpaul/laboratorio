<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHemogramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hemogramas', function (Blueprint $table) {
            $table->id();
            $table->string('requerido');
            $table->date('fechaentrega');
            $table->date('fechatoma');
            $table->text('tipomuestra');
            $table->text('token');
            $table->text('d1');
            $table->text('d1r');
            $table->text('d2');
            $table->text('d2r');
            $table->text('d3');
            $table->text('d3r');
            $table->text('d4');
            $table->text('d4r');
            $table->text('d5');
            $table->text('d5r');
            $table->text('d6');
            $table->text('d6r');
            $table->text('d7');
            $table->text('d7r');
            $table->text('d8');
            $table->text('d8r');
            $table->text('d9');
            $table->text('d9r');
            $table->text('d10');
            $table->text('d10r');
            $table->text('d11');
            $table->text('d11r');
            $table->text('d12');
            $table->text('d12r');
            $table->text('d13');
            $table->text('d13r');
            $table->text('d14');
            $table->text('d14r');
            $table->text('d15');
            $table->text('d15r');
            $table->text('d16');
            $table->text('d16r');
            $table->text('d17');
            $table->text('d17r');
            $table->text('d18');
            $table->text('d18r');
            $table->text('d19');
            $table->text('d19r');
            $table->text('d20');
            $table->text('d20r');
            $table->text('d21');
            $table->text('d21r');
            $table->text('d22');
            $table->text('d22r');
            $table->text('d23');
            $table->text('d23r');
            $table->text('d24');
            $table->text('d24r');
            $table->text('d25');
            $table->text('d25r');
            $table->text('d26');
            $table->text('d26r');
            $table->text('d27');
            $table->text('d27r');
            $table->text('d28');
            $table->text('d28r');
            $table->text('d29');
            $table->text('d29r');
            $table->text('d30');
            $table->text('d30r');
            $table->text('d31');
            $table->text('d31r');
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
        Schema::dropIfExists('hemogramas');
    }
}
