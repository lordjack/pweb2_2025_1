@extends('base')
@section('titulo', 'Formulário Aluno')
@section('conteudo')

    <h3>Formulário Aluno</h3>

    @php
        if (!empty($dado->id)) {
            $action = route('aluno.update', $dado->id);
        } else {
            $action = route('aluno.store');
        }
    @endphp

    <form action="{{ $action }}" method="post">
        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <label for="">Nome</label><br>
        <input type="text" name="nome" value="{{ old('nome', $dado->nome ?? '') }}"><br>

        <label for="">CPF</label><br>
        <input type="text" name="cpf" value="{{ old('cpf', $dado->cpf ?? '') }}"><br>

        <label for="">Telefone</label><br>
        <input type="text" name="telefone" value="{{ old('telefone', $dado->telefone ?? '') }}"><br>

        <label for="">Categoria</label><br>
        <select name="categoria_id">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                    {{ old('categoria_id', $dado->categoria_id ?? '') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>
        <br>
        @php
            $nome_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.jpg';
        @endphp
        <label for="">Imagem</label><br>
        <img src="/storage/{{ $nome_imagem }}" width="200px" height="200px" alt="imagem">
        <input type="file" name="imagem" value="{{ old('imagem', $dado->imagem ?? '') }}">
        <br>


        <button type="submit">Salvar</button><br>
        <a href="{{ url('aluno') }}">Voltar</a>

    </form>

@stop
