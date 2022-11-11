@extends('layouts.app')
@section('title','jogo - '.$jogo->nome)
@section('content')
    <div class="card w-50 m-auto">
        @php
            $nomeimagem = "";
            if(file_exists("./img/jogos/".md5($jogo->id).".jpg")) {
                $nomeimagem = "./img/jogos/".md5($jogo->id).".jpg";
            } elseif (file_exists("./img/jogos/".md5($jogo->id).".png")) {
                $nomeimagem = "./img/jogos/".md5($jogo->id).".png";
            } elseif (file_exists("./img/jogos/".md5($jogo->id).".gif")) {
                $nomeimagem =  "./img/jogos/".md5($jogo->id).".gif";
            } elseif (file_exists("./img/jogos/".md5($jogo->id).".webp")) {
                $nomeimagem = "./img/jogos/".md5($jogo->id).".webp";
            } elseif (file_exists("./img/jogos/".md5($jogo->id).".jpeg")) {
                $nomeimagem = "./img/jogos/".md5($jogo->id).".jpeg";
            } else {
                $nomeimagem = "./img/jogos/jogosemfoto.webp";
            }
            //echo $nomeimagem;
        @endphp

        {{Html::image(asset($nomeimagem),'Foto de '.$jogo->nome,["class"=>"img-thumbnail w-75 mx-auto d-block"])}}

        <div class="card-header">
            <h1>jogo - {{$jogo->nome}}</h1>
        </div>
        <div class="card-body">
                <h3 class="card-title">ID: {{$jogo->id}}</h3>
                <p class="text">Descrição: {{$jogo->descricao}}</p>
                Plataforma: {{$jogo->plataforma}}<br/>
                Categoria: {{$jogo->categoria}}<br/>
                Ano de lançamento: {{$jogo->ano}}</p>
        </div>
        <div class="card-footer">
            @if ((Auth::check()) && (Auth::user()->isAdmin()))
                {{Form::open(['route' => ['jogos.destroy',$jogo->id],'method' => 'DELETE'])}}
                @if ($nomeimagem !== "./img/jogos/jogosemfoto.webp")
                {{Form::hidden('foto',$nomeimagem)}}
                @endif
                <a href="{{url('jogos/'.$jogo->id.'/edit')}}" class="btn btn-success">Alterar</a>
                {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}
            @endif
            <a href="{{url('jogos/')}}" class="btn btn-secondary">Voltar</a>
            @if ((Auth::check()) && (Auth::user()->isAdmin()))
                {{Form::close()}}
            @endif
        </div>
    </div>
    <br />
    <div class="card w-70 m-auto">
        <div class="card-header">
            <h1>Empréstimos</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Id</th>
                    <th>Contato</th>
                    <th>Data</th>
                    <th>Devolução</th>
                </tr>
                @foreach ($jogo->emprestimos as $emprestimo)
                        <tr>
                            <td>
                                <a href="{{url('emprestimos/'.$emprestimo->id)}}">{{$emprestimo->id}}</a>
                            </td>
                            <td>
                                {{$emprestimo->contato_id}} - {{$emprestimo->contato->nome}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::create($emprestimo->datahora)->format('d/m/Y H:i:s')}}
                            </td>
                            <td>{!!$emprestimo->devolvido!!}</td>
                        </tr>
                    @endforeach
            </table>
        </div>

@endsection
