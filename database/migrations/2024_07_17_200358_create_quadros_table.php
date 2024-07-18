<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuadrosTable extends Migration
{
    public function up()
    {
        Schema::create('quadros', function (Blueprint $table) {
            $table->id();
            $table->string('titolo');
            $table->year('anno');
            $table->string('genere');
            $table->unsignedBigInteger('artista_id');
            $table->timestamps();

            $table->foreign('artista_id')->references('id')->on('artistas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quadros');
    }
}

