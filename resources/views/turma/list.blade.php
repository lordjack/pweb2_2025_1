@extends('base')
@section('titulo', 'Listagem de Turmas - Curso')
@section('conteudo')

    <h3>Listagem de Turmas - Curso {{ $curso->nome }}</h3>

    <form action="{{ route('curso.search') }}" method="post">
        @csrf
        <label for="">Tipo</label><br>
        <select name="tipo">
            <option value="nome">Nome</option>
            <option value="requisito">Requisito</option>
            <option value="carga_horaria">Carga Horária</option>
        </select><br>
        <input type="text" name="valor" placeholder="Valor">
        <button type="submit">Buscar</button>
        <a href="{{ route('curso.turmas.create', $curso->id) }}">Novo</a>
        <a href="{{ route('curso.index') }}">Voltar para Curso</a>

    </form>

    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Requisito</td>
                <td>Carga Horária</td>
                <td>Valor</td>
                <td>Ação</td>
                <td>Ação</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ date('d/m/Y', strtotime($item->data_inicio)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($item->data_fim)) }}</td>

                    <td>
                        <a href="{{ route('turma.edit', $item->id) }}">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('turma.destroy', $item->id) }}" method="post">
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
