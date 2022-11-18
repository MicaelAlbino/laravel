<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Endereco;
class ClienteController extends Controller
{
    public function cadastrar(Request $request){
        $data = [];

        return view("cadastrar", $data);
    }

    public function cadastrarCliente(Request $request){
        //todos os valores do form
        $values = $request->all();
        $cliente = new Cliente();
        $cliente->fill($values);

        $endereco = new Endereco($values);

        try{
            $cliente->save();
            $endereco->cliente_id = $cliente->id;
            $endereco->save();
            
          
        }catch(\Exception){
            
        }

        return redirect()->route("cadastrar");
    }
}
