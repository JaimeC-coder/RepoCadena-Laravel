<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_naturals', function (Blueprint $table) {
            $table->id();
            $table->string('dni',8)->unique();
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('email',50)->unique();
            $table->string('telefono',50);
            $table->string('direccion',50);
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('cliente_naturals');
    }
};
