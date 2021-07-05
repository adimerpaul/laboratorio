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
            $table->string('requerido')->nullable()->default('');
            $table->string('tipomuestra')->nullable()->default('');
//            $table->date('fechaentrega')->nullable()->default('');
            $table->date('fechatoma')->nullable();

//            $table->text('token');
            $table->string('d1')->nullable()->default('');
            //$table->text('d1r')->$this->nullable()->$this->default(');
            $table->string('d2')->nullable()->default('');
            //$table->text('d2r')->$this->nullable()->$this->default(');
            $table->string('d3')->nullable()->default('');
            //$table->text('d3r')->$this->nullable()->$this->default(');
            $table->string('d4')->nullable()->default('');
            //$table->text('d4r')->$this->nullable()->$this->default(');
            $table->string('d5')->nullable()->default('');
            //$table->text('d5r')->$this->nullable()->$this->default(');
            $table->string('d6')->nullable()->default('');
            //$table->text('d6r')->$this->nullable()->$this->default(');
            $table->string('d7')->nullable()->default('');
            //$table->text('d7r')->$this->nullable()->$this->default(');
            $table->string('d8')->nullable()->default('');
            //$table->text('d8r')->$this->nullable()->$this->default(');
            $table->string('d9')->nullable()->default('');
            //$table->text('d9r')->$this->nullable()->$this->default(');
            $table->string('d10')->nullable()->default('');
            //$table->text('d10r')->$this->nullable()->$this->default(');
            $table->string('d11')->nullable()->default('');
            //$table->text('d11r')->$this->nullable()->$this->default(');
            $table->string('d12')->nullable()->default('');
            //$table->text('d12r')->$this->nullable()->$this->default(');
            $table->string('d13')->nullable()->default('');
            //$table->text('d13r')->$this->nullable()->$this->default(');
            $table->string('d14')->nullable()->default('');
            //$table->text('d14r')->$this->nullable()->$this->default(');
            $table->string('d15')->nullable()->default('');
            //$table->text('d15r')->$this->nullable()->$this->default(');
            $table->string('d16')->nullable()->default('');
            //$table->text('d16r')->$this->nullable()->$this->default(');
            $table->string('d17')->nullable()->default('');
            //$table->text('d17r')->$this->nullable()->$this->default(');
            $table->string('d18')->nullable()->default('');
            //$table->text('d18r')->$this->nullable()->$this->default(');
            $table->string('d19')->nullable()->default('');
            //$table->text('d19r')->$this->nullable()->$this->default(');
            $table->string('d20')->nullable()->default('');
            //$table->text('d20r')->$this->nullable()->$this->default(');
            $table->string('d21')->nullable()->default('');
            //$table->text('d21r')->$this->nullable()->$this->default(');
            $table->string('d22')->nullable()->default('');
            //$table->text('d22r')->$this->nullable()->$this->default(');
            $table->string('d23')->nullable()->default('');
            //$table->text('d23r')->$this->nullable()->$this->default(');
            $table->string('d24')->nullable()->default('');
            //$table->text('d24r')->$this->nullable()->$this->default(');
            $table->string('d25')->nullable()->default('');
            //$table->text('d25r')->$this->nullable()->$this->default(');
            $table->string('d26')->nullable()->default('');
            //$table->text('d26r')->$this->nullable()->$this->default(');
            $table->string('d27')->nullable()->default('');
            //$table->text('d27r')->$this->nullable()->$this->default(');
            $table->string('d28')->nullable()->default('');
            //$table->text('d28r')->$this->nullable()->$this->default(');
            $table->string('d29')->nullable()->default('');
            //$table->text('d29r')->$this->nullable()->$this->default(');
            $table->string('d30')->nullable()->default('');
            //$table->text('d30r')->$this->nullable()->$this->default(');
            $table->string('d31')->nullable()->default('');
            //$table->text('d31r')->$this->nullable()->$this->default(');
            $table->string('d32')->nullable()->default('');
            //$table->text('d32r')->$this->nullable()->$this->default(');
            $table->string('d33')->nullable()->default('');
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
