<?php

namespace App\Models;

class Endereco extends ModeloOficial
{
       protected $table = "enderecos";
    
       protected $fillable = ['telefone', 'cep', 'cidade', 'estado'];
}
