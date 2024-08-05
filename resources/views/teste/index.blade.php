<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1 class="display-5">Index</h1>

    <ul class="nav nav-tabs" >
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('aula4.index')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('aula4.create')}}">Cadastrar</a>
        </li>
    </ul>
    <br>

    <table class="table table-hover" border="1px">
        <thead>
        <tr>
            <th scope="col">Id</th>  <th scope="col">Nome</th>  <th scope="col">Email</th> <th scope="col">Detalhes</th> <th scope="col">Alterar</th> <th scope="col">Excluir</th>
        </tr>
        </thead>
        <?php if ($info != null) { ?>
            @foreach ($info as $item)
            
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td> 
                <td>{{$item->email}}</td> 
                <td>
                    <a href="{{route('aula4.show', $item->id)}}"><button class="btn btn-dark">Detalhes</button></a>
                </td>
                <td>
                    <a href="{{route('aula4.edit', $item->id)}}"><button class="btn btn-dark">Alterar</button></a>
                </td>
                <td>
                    <form action="{{route('aula4.destroy', $item->id)}}" method="post" name="delete">
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" name="envia">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
    @php
    }
    @endphp
    </table>
    <!--
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Detalhes</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Gianluca</td>
            <td>gianlucamk04@gmail.com</td>
            <td><a href="{{ route('aula4.show',1) }}">Detalhes</a></td>
            <td><a href="{{ route('aula4.edit',1) }}">Editar</a></td>
            <td>
                <form action=" {{ route('aula4.destroy',1) }} " method="post">
                @csrf
                @method('DELETE')
                <a href="#" onclick="this.parentNode.submit();">Excluir</a>
                </form>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Pedro</td>
            <td>pedroscgamer@gmail.com</td>
            <td><a href="{{ route('aula4.show',2) }}">Detalhes</a></td>
            <td><a href="{{ route('aula4.edit',2) }}">Editar</a></td>
            <td>
                <form action=" {{ route('aula4.destroy',2) }} " method="post">
                @csrf
                @method('DELETE')
                <a href="#" onclick="this.parentNode.submit();">Excluir</a>
                </form>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Igor</td>
            <td>igorkramigra@gmail.com</td>
            <td><a href="{{ route('aula4.show',3) }}">Detalhes</a></td>
            <td><a href="{{ route('aula4.edit',3) }}">Editar</a></td>
            <td>
                <form action=" {{ route('aula4.destroy',3) }} " method="post">
                @csrf
                @method('DELETE')
                <a href="#" onclick="this.parentNode.submit();">Excluir</a>
                </form>
            </td>
        </tr>
    </table>
-->
</body>
</html>