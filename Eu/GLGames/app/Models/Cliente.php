<?php

namespace App\Models;

class Cliente extends ModeloOficial
{
   protected $table = "cliente";

   protected $fillable = ['cpf', 'contato', 'nome'];
}
