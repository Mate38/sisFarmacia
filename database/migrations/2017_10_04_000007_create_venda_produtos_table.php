<?php

/**
 * Autor: Mateus Cardoso
 * 
 * E-mail: matecardoso38@gmail.com
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaProdutosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'venda_produtos';

    /**
     * Run the migrations.
     * @table venda_produtos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('quantidade')->nullable();
            $table->decimal('valorTotal', 10, 2)->nullable();
            $table->timestamps();

            $table->integer('produtos_id')->unsigned();
            $table->foreign('produtos_id')->references('idprodutos')->on('produtos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
