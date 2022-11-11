<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\jogo;
use Illuminate\Http\Request;
use Session;

class jogosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogos = jogo::simplepaginate(5);
        return view('jogo.index',array('jogos' => $jogos,'busca'=>null));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request) {
        $jogos = jogo::where('nome','LIKE','%'.$request->input('busca').'%')->orwhere('descricao','LIKE','%'.$request->input('busca').'%')->orwhere('autor','LIKE','%'.$request->input('busca').'%')->orwhere('plataforma','LIKE','%'.$request->input('busca').'%')->simplepaginate(5);
        return view('jogo.index',array('jogos' => $jogos,'busca'=>$request->input('busca')));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
            return view('jogo.create');
        } else {
            return redirect('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
            $this->validate($request,[
                'nome' => 'required|min:3',
                'descricao' => 'required',
                'autor' => 'required',
                'plataforma' => 'required',
                'ano' => 'required',
            ]);
            $jogo = new jogo();
            $jogo->nome = $request->input('nome');
            $jogo->descricao = $request->input('descricao');
            $jogo->autor = $request->input('autor');
            $jogo->plataforma = $request->input('plataforma');
            $jogo->ano = $request->input('ano');
            if($jogo->save()) {
                if($request->hasFile('foto')){
                    $imagem = $request->file('foto');
                    $nomearquivo = md5($jogo->id).".".$imagem->getClientOriginalExtension();
                    $request->file('foto')->move(public_path('.\img\jogos'),$nomearquivo);
                }
                return redirect('jogos');
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jogo = jogo::find($id);
        return view('jogo.show',array('jogo' => $jogo));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
            $jogo = jogo::find($id);
            return view('jogo.edit',array('jogo' => $jogo));
        } else {
            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
            $this->validate($request,[
                'nome' => 'required|min:3',
                'descricao' => 'required',
                'autor' => 'required',
                'plataforma' => 'required',
                'ano' => 'required',
            ]);
            $jogo = jogo::find($id);
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($jogo->id).".".$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\jogos'),$nomearquivo);
            }
            $jogo->nome = $request->input('nome');
            $jogo->descricao = $request->input('descricao');
            $jogo->autor = $request->input('autor');
            $jogo->plataforma  = $request->input('plataforma');
            $jogo->ano = $request->input('ano');
            if($jogo->save()) {
                Session::flash('mensagem','jogo alterado com sucesso');
                return redirect('jogos');
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
            $jogo = jogo::find($id);
            if (isset($request->foto)) {
            unlink($request->foto);
            }
            $jogo->delete();
            Session::flash('mensagem','jogo Excluído com Sucesso');
            return redirect(url('jogos/'));
        } else {
            return redirect('login');
        }
    }
}
