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
            $table->string('requerido')->nullable()->default('');
            $table->string('tipomuestra')->nullable()->default('');
            $table->date('fechatoma')->nullable();
            $table->string('d1')->nullable()->default('');
            $table->string('d2')->nullable()->default('');
            $table->string('d3')->nullable()->default('');
            $table->string('d4')->nullable()->default('');
            $table->string('d5')->nullable()->default('');
            $table->string('d6')->nullable()->default('');
            $table->string('d7')->nullable()->default('');
            $table->string('d8')->nullable()->default('');
            $table->string('d9')->nullable()->default('');
            $table->string('d10')->nullable()->default('');
            $table->string('d11')->nullable()->default('');
            $table->string('d12')->nullable()->default('');
            $table->string('d13')->nullable()->default('');
            $table->string('d14')->nullable()->default('');
            $table->string('d15')->nullable()->default('');
            $table->string('d16')->nullable()->default('');
            $table->string('d17')->nullable()->default('');
            $table->string('d18')->nullable()->default('');
            $table->string('d19')->nullable()->default('');
            $table->string('d20')->nullable()->default('');
            $table->string('d21')->nullable()->default('');
            $table->string('d22')->nullable()->default('');
            $table->string('d23')->nullable()->default('');
            $table->string('d24')->nullable()->default('');
            $table->string('d25')->nullable()->default('');
            $table->string('d26')->nullable()->default('');
            $table->string('d27')->nullable()->default('');
            $table->string('d28')->nullable()->default('');
            $table->string('d29')->nullable()->default('');
            $table->string('d30')->nullable()->default('');
            $table->string('d31')->nullable()->default('');
            $table->string('d32')->nullable()->default('');
            $table->string('d33')->nullable()->default('');
            $table->string('d34')->nullable()->default('');
            $table->string('d35')->nullable()->default('');
            $table->string('d36')->nullable()->default('');
            $table->string('d37')->nullable()->default('');
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
