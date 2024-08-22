<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>

    <h1 class="display-5">Info</h1>

    @include('usuario.menu')
    <br>

    <table class="table table-hover" border="1px">
        <thead>
        <tr>
            <th scope="col">Id</th>  <th scope="col">Nome</th> <th scope="col">Email</th> <th scope="col">DataNascimento</th> <th scope="col">Setor</th> <th scope="col">Perfil</th>
        </tr>
        </thead>
        <tr>
            <td>{{$especif->id}}</td>
            <td>{{$especif->nome}}</td>
            <td>{{$especif->email}}</td>
            <td>{{$especif->dataNascimento}}</td>
            <td>{{$setor->descricao}}</td>
            @if ($perfil != null)
            <td>{{$perfil->descricao}}</td> 
            @else
            <td></td> 
            @endif
        </tr>
    </table>
</body>
</html>