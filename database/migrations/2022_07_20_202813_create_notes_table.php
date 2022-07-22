<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            //$table->integer('message_id')->unsigned();//unsigned para recibir enteros positivos
            //$table->foreign('message_id')->references('id')->on('messages');Para hacer relacion con foreign key.

            $table->integer('notable_id')->unsigned();//iria el id.
            $table->string('notable_type');//Para definir tipo de relacion, iria el modelo User
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
        Schema::dropIfExists('notes');
    }
}
