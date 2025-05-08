@extends('base')
@section('titulo', 'Listagem Aluno')
@section('conteudo')

    <h3>Listagem de Curso</h3>

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
        <a href="{{ url('curso/create') }}">Novo</a>
        <a href="{{ url('curso/report') }}">Gerar PDF</a>

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
                <td>Ação</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->requisito }}</td>
                    <td>{{ $item->carga_horaria }}</td>
                    <td>{{ $item->valor}}</td>
                    <td>
                        <a href="{{ route('curso.edit', $item->id) }}">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('curso.turmas', $item->id) }}">Ver Turmas ({{ $item->turmas->count() }})</a>
                    </td>
                    <td>
                        <form action="{{ route('curso.destroy', $item->id) }}" method="post">
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
