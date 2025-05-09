@extends('base')
@section('titulo', isset($dado) ? 'Editar Turma' : 'Nova Turma')
@section('conteudo')

    <h3>{{ isset($dado) ? 'Editar' : 'Nova' }} Turma - Curso: {{ isset($dado) ? $dado->curso->nome : $curso->nome }}</h3>

    @if(isset($dado))
        <form action="{{ route('turma.update', $dado->id) }}" method="post">
        @method('PUT')
    @else
        <form action="{{ route('turma.store') }}" method="post">
    @endif
        @csrf

        <input type="hidden" name="curso_id" value="{{ isset($dado) ? $dado->curso_id : $curso->id }}">

        <label for="">Nome</label><br>
        <input type="text" name="nome" value="{{ isset($dado) ? $dado->nome : old('nome') }}"><br>

        <label for="">Código</label><br>
        <input type="text" name="codigo" value="{{ isset($dado) ? $dado->codigo : old('codigo') }}"><br>

        <label for="">Data Início</label><br>
        <input type="date" name="data_inicio" value="{{ isset($dado) ? \Carbon\Carbon::parse($dado->data_inicio)->format('Y-m-d') : old('data_inicio') }}"><br>

        <label for="">Data Fim</label><br>
        <input type="date" name="data_fim" value="{{ isset($dado) ? \Carbon\Carbon::parse($dado->data_fim)->format('Y-m-d') : old('data_fim') }}"><br>


        <button type="submit">Salvar</button><br>
        <a href="{{ route('curso.turmas', isset($dado) ? $dado->curso_id : $curso->id) }}">Voltar</a>
    </form>

@stop
