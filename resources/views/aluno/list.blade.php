@extends('base')
@section('titulo', 'Listagem Aluno')
@section('conteudo')

    <h3>Listagem de Alunos</h3>

    <a href="{{ url('aluno/create') }}">Novo</a>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>CPF</td>
                <td>Telefone</td>
                <td>Ação</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->cpf }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>
                        <form action="{{ route('aluno.destroy', $item->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                             onclick="return confirm('Deseja remover o registro?')">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
