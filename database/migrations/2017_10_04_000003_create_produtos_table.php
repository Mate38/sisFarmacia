<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'produtos';

    /**
     * Run the migrations.
     * @table produtos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idprodutos');
            $table->string('nome', 45)->nullable();
            $table->decimal('valor', 10, 2)->nullable();
            $table->string('descricao', 45)->nullable();
            $table->string('classificacao', 45)->nullable();
            $table->string('unidade', 45)->nullable();
            $table->float('quantidade')->nullable();
            $table->string('nome_generico', 45)->nullable();
            $table->unsignedInteger('fornecedores_idfornecedores');

            $table->index(["fornecedores_idfornecedores"], 'fk_produtos_fornecedores1_idx');


            $table->foreign('fornecedores_idfornecedores', 'fk_produtos_fornecedores1_idx')
                ->references('idfornecedores')->on('fornecedores')
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
