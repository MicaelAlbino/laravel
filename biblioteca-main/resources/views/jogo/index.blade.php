@extends('layouts.app')
@section('title','Listagem de jogos')
@section('content')
    <h1>Listagem de jogos</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-info">
            {{Session::get('mensagem')}}
        </div>
    @endif
    {{Form::open(['url'=>'jogos/buscar','method'=>'GET'])}}
        <div class="row">
            @if ((Auth::check()) && (Auth::user()->isAdmin()))
                <div class="col-sm-3">
                    <a class="btn btn-success" href="{{url('jogos/create')}}">Criar</a>
                </div>
            @endif
            <div class="col-sm-9">
                <div class="input-group ml-5">
                    @if($busca !== null)
                        &nbsp;<a class="btn btn-info" href="{{url('jogos/')}}">Todos</a>&nbsp;
                    @endif
                    {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
                    &nbsp;
                    <span class="input-group-btn">
                        {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
                    </span>
                </div>
            </div>
        </div>
    {{Form::close()}}
    <br />
    <table class="table table-striped">
        @foreach ($jogos as $jogo)
            <tr>
                <td>
                    <a href="{{url('jogos/'.$jogo->id)}}">{{$jogo->nome}}</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $jogos->links() }}
@endsection
