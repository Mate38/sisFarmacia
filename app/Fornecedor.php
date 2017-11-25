<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $primaryKey = 'idfornecedores'; 
    protected $table = "fornecedores";

    protected $fillable = [
        'nome', 'cnpj', 'endereco',
    ];

}
