<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('cuenta')->nullable();
            $table->string('destinatario')->nullable();
            $table->text('direccion')->nullable();
            $table->string('municipio')->nullable();
            $table->string('departamento')->nullable();
            $table->string('ruta')->nullable();
            $table->string('status')->nullable();
            $table->string('recibe')->nullable();
            $table->integer('banco')->nullable();
            $table->text('observaciones')->nullable();
            $table->date('fecha')->nullable();
            $table->string('corte')->nullable();
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
        Schema::dropIfExists('registers');
    }
}
