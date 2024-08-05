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

    <ul class="nav nav-tabs" >
        <li class="nav-item">
            <a class="nav-link" href="{{route('aula4.index')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('aula4.create')}}">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('aula4.show', $especif->id)}}">Info</a>
        </li>
    </ul>
    <br>
    <br>

    <table class="table table-hover" border="1px">
        <thead>
        <tr>
            <th scope="col">Id</th>  <th scope="col">Nome</th>  <th scope="col">Email</th> <th scope="col">Data de Criação</th>
        </tr>
        </thead>
        <tr>
            <td>{{$especif->id}}</td>
            <td>{{$especif->nome}}</td> 
            <td>{{$especif->email}}</td>
            <td>{{$especif->criacao}}</td> 
        </tr>
    </table>
</body>
</html>