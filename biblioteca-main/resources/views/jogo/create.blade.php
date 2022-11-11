@extends('layouts.app')
@section('title','Cadastrar novo jogo')
@section('content')
    <h1>Cadastrar novo jogo 
    </h1>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <br />
    {{Form::open(['route' => 'jogos.store', 'method' => 'POST','enctype'=>'multipart/form-data'])}}
        {{Form::label('nome', 'Nome')}}
        {{Form::text('nome','',['class'=>'form-control','required','placeholder'=>'Nome do jogo'])}}
        {{Form::label('descricao', 'Descrição')}}
        {{Form::textarea('descricao','',['class'=>'form-control','required','placeholder'=>'Descrição','rows'=>'8'])}}
        {{Form::label('plataforma', 'Plataforma')}}
        {{Form::text('plataforma','',['class'=>'form-control','required','placeholder'=>'Plataforma do jogo'])}}
        {{Form::label('categoria', 'Categoria')}}
        {{Form::text('categoria','',['class'=>'form-control','required','placeholder'=>'Categoria'])}}
        {{Form::label('ano', 'Ano')}}
        {{Form::number('ano','',['class'=>'form-control','required','placeholder'=>'Ano de lançamento'])}}
        {{Form::label('foto', 'Foto')}}
        {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary'])!!}
    {{Form::close()}}
@endsection
