<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstoquesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'estoques';

    /**
     * Run the migrations.
     * @table estoques
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idestoques');
            $table->integer('quantidade')->nullable();
            $table->date('data_chegada')->nullable();
            $table->date('data_vencimento')->nullable();
            $table->date('data_fabricacao')->nullable();
            $table->string('lote_produto', 45)->nullable();
            $table->unsignedInteger('produtos_idprodutos');

            $table->index(["produtos_idprodutos"], 'fk_estoques_produtos1_idx');


            $table->foreign('produtos_idprodutos', 'fk_estoques_produtos1_idx')
                ->references('idprodutos')->on('produtos')
                ->onDelete('no action')
                ->onUpdate('no action');
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
