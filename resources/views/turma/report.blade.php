<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>Titulo: {{ $titulo }}</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus numquam autem doloremque! Maiores ullam unde
        incidunt ipsa hic inventore cumque modi dolorem quaerat fugit animi corporis consectetur, iusto voluptas.
        Labore!</p>

    <table>
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Categoria</th>
        </thead>
        <tbody>
            @foreach ($alunos as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>{{ $item->cpf }}</td>
                    <td>{{ $item->categoria->nome ?? '' }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>
