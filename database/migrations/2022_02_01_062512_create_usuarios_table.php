<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',64);
            $table->string('apellido_paterno',64);
            $table->string('apellido_materno',64);
            $table->date('fecha_nacimiento');
            $table->enum('sexo',['Masculino','Femenino'])->nullable(true);
            $table->string('calle',64);
            $table->integer('numero_exterior');
            $table->integer('numero_interior')->nullable(true);
            $table->string('colonia',64);
            $table->string('ciudad',64);
            $table->string('estado',64);
            $table->integer('codigo_postal');
            $table->enum('estatus',['Predeterminado','Activo','Suspendido','Sin autorizar']);
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
        Schema::dropIfExists('usuarios');
    }
}
