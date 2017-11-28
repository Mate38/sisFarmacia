<?php

/**
 * Autor: Mateus Cardoso
 * 
 * E-mail: matecardoso38@gmail.com
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('quantidade', 8, 2);
            $table->decimal('valorTotal', 8, 2);
            $table->integer('produtos_id')->unsigned();
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
        //
    }
}
