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
            $table->string('tipomuestra');
//            $table->date('fechaentrega');
            $table->date('fechatoma');

//            $table->text('token');
            $table->string('d1');
            //$table->text('d1r');
            $table->string('d2');
            //$table->text('d2r');
            $table->string('d3');
            //$table->text('d3r');
            $table->string('d4');
            //$table->text('d4r');
            $table->string('d5');
            //$table->text('d5r');
            $table->string('d6');
            //$table->text('d6r');
            $table->string('d7');
            //$table->text('d7r');
            $table->string('d8');
            //$table->text('d8r');
            $table->string('d9');
            //$table->text('d9r');
            $table->string('d10');
            //$table->text('d10r');
            $table->string('d11');
            //$table->text('d11r');
            $table->string('d12');
            //$table->text('d12r');
            $table->string('d13');
            //$table->text('d13r');
            $table->string('d14');
            //$table->text('d14r');
            $table->string('d15');
            //$table->text('d15r');
            $table->string('d16');
            //$table->text('d16r');
            $table->string('d17');
            //$table->text('d17r');
            $table->string('d18');
            //$table->text('d18r');
            $table->string('d19');
            //$table->text('d19r');
            $table->string('d20');
            //$table->text('d20r');
            $table->string('d21');
            //$table->text('d21r');
            $table->string('d22');
            //$table->text('d22r');
            $table->string('d23');
            //$table->text('d23r');
            $table->string('d24');
            //$table->text('d24r');
            $table->string('d25');
            //$table->text('d25r');
            $table->string('d26');
            //$table->text('d26r');
            $table->string('d27');
            //$table->text('d27r');
            $table->string('d28');
            //$table->text('d28r');
            $table->string('d29');
            //$table->text('d29r');
            $table->string('d30');
            //$table->text('d30r');
            $table->string('d31');
            //$table->text('d31r');
            $table->string('d32');
            //$table->text('d32r');
            $table->string('d33');
            //$table->text('d33r');
//            $table->string('d34');
            //$table->text('d34r');
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
