<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudients', function (Blueprint $table) {
            $table->id();
            $table->string('nom',100);
            $table->string('adresse',100);
            $table->string('phone',100);
            $table->string('email',100);
            $table->date('date_naissance');
            $table->timestamps();
            $table->foreignId('ville_id')->constrained('villes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudients');
    }
}
