@extends('base')
@section('titulo', 'Formulário Curso')
@section('conteudo')

    <h3>Formulário Curso</h3>

    @php
        if (!empty($dado->id)) {
            $action = route('curso.update', $dado->id);
        } else {
            $action = route('curso.store');
        }
    @endphp

    <form action="{{ $action }}" method="post">
        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <label for="">Nome</label><br>
        <input type="text" name="nome" value="{{ old('nome', $dado->nome ?? '') }}"><br>

        <label for="">Requisito</label><br>
        <input type="text" name="requisito" value="{{ old('requisito', $dado->requisito ?? '') }}"><br>

        <label for="">Carga Horária</label><br>
        <input type="text" name="carga_horaria" value="{{ old('carga_horaria', $dado->carga_horaria ?? '') }}"><br>

        <label for="">Valor</label><br>
        <input type="text" name="valor" value="{{ old('valor', $dado->valor ?? '') }}"><br>


        <button type="submit">Salvar</button><br>
        <a href="{{ url('curso') }}">Voltar</a>

    </form>

@stop
