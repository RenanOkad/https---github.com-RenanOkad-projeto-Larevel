<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->primary('id');
            $table->string('nome',255);
            $table->string('rua',255);
            $table->string('numero',255);
            $table->string('bairro',255);
            $table->timestamps();
            $table->unsignedBigInteger('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades');
        });

        DB::statement("ALTER TABLE `delivery_laravel`.`enderecos` CHANGE COLUMN `id` `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};
