@extends('base')
@section('titulo', 'Formulário Turma')
@section('conteudo')

    <h3>{{ isset($dado) ? 'Editar' : 'Novo' }} Formulário Turma - {{ isset($dado) ? $dado->curso->nome : $curso->nome }}
    </h3>

    @php
        if (!empty($dado->id)) {
            $action = route('turma.update', $dado->id);

            $data_inicio = date('d/m/Y', strtotime($dado->data_inicio));
            $data_fim = date('d/m/Y', strtotime($dado->data_fim));
        } else {
            $action = route('turma.store');
        }
    @endphp

    <form action="{{ $action }}" method="post">
        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif
        <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '') }}">
        <input type="hidden" name="curso_id" value="{{ old('curso_id', $dado->curso_id ?? $curso->id) }}">

        <label for="">Nome</label><br>
        <input type="text" name="nome" value="{{ old('nome', $dado->nome ?? '') }}"><br>

        <label for="">Código</label><br>
        <input type="text" name="codigo" value="{{ old('codigo', $dado->codigo ?? '') }}"><br>

        <label for="">Data Inínicio</label><br>
        <input type="text" name="data_inicio" value="{{ old('data_inicio', $data_inicio ?? '') }}"><br>

        <label for="">Data Fim</label><br>
        <input type="text" name="data_fim" value="{{ old('data_fim', $data_fim ?? '') }}"><br>


        <button type="submit">Salvar</button><br>
        <a href="{{ route('curso.turmas', isset($dado) ? $dado->curso->id : $curso->id) }}">Voltar</a>

    </form>

@stop
