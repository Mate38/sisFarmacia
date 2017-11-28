<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";
	protected $primaryKey = 'idprodutos'; 

    public function nome($id)
    {
        return $fornecedor = Fornecedor::find($id)->nome;
    }
}
