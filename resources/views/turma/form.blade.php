@extends('base')
@section('titulo', 'Formulário Turma')
@section('conteudo')

    <h3>Nova Turma - Curso: {{ $curso->nome }}</h3>

    <form action="{{ route('turma.store') }}" method="post">
        @csrf

        <input type="hidden" name="curso_id" value="{{ $curso->id }}">

        <label for="">Nome</label><br>
        <input type="text" name="nome" value="{{ old('nome') }}"><br>

        <label for="">Código</label><br>
        <input type="text" name="codigo" value="{{ old('codigo') }}"><br>

        <label for="">Data Início</label><br>
        <input type="date" name="data_inicio" value="{{ old('data_inicio') }}"><br>

        <label for="">Data Fim</label><br>
        <input type="date" name="data_fim" value="{{ old('data_fim') }}"><br>

        <button type="submit">Salvar</button><br>
        <a href="{{ route('curso.turmas', $curso->id) }}">Voltar</a>
    </form>

@stop
