@extends('base')
@section('titulo', 'Listagem de Turmas')
@section('conteudo')

    <h3>Listagem de Turmas - Curso: {{ $curso->nome }}</h3>

    <form action="{{ route('turma.search') }}" method="post">
        @csrf
        <label for="">Tipo</label><br>
        <select name="tipo">
            <option value="nome">Nome</option>
            <option value="codigo">Código</option>
        </select><br>
        <input type="text" name="valor" placeholder="Valor">
        <button type="submit">Buscar</button>
        <a href="{{ route('curso.turmas.create', $curso->id) }}">Nova Turma</a>
        <a href="{{ route('curso.index') }}">Voltar para Cursos</a>

    </form>

    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Código</td>
                <td>Data Início</td>
                <td>Data Fim</td>
                <td>Ações</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->data_inicio }}</td>
                    <td>{{ $item->data_fim }}</td>
                    <td>
                        <a href="{{ route('turma.edit', $item->id) }}">Editar</a>
                        <form action="{{ route('turma.destroy', $item->id) }}" method="post" style="display: inline;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" onclick="return confirm('Deseja remover o registro?')">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
