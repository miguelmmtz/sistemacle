<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('idioma');
            $table->string('nivel');
            $table->string('modalidad');
            $table->string('horario');
            $table->string('nombre')->unique();
            $table->string('salon');
            $table->string('periodo');
            $table->string('cantAlumnos');
            $table->string('status');
            $table->unsignedBigInteger('id_docente');
            $table->timestamps();

            $table->foreign('id_docente')
                ->references('id')
                ->on('docentes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
