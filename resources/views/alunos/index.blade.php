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
    <script>
        function confirmDelete(formName) {
            if (confirm('Tem certeza que deseja excluir este item?')) {
                document.forms[formName].submit();
            }
        }   
    </script>
    <h1 class="display-5">Index</h1>

    @include('alunos.menu')
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
                    <a href="{{route('alunos.show', $item->id)}}"><button class="btn btn-dark">Detalhes</button></a>
                </td>
                <td>
                    <a href="{{route('alunos.edit', $item->id)}}"><button class="btn btn-dark">Alterar</button></a>
                </td>
                <td>
                    <form name="{{'form_delete_'.$item->id}}" action="{{route('alunos.destroy', $item->id)}}" method="post" name="delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="confirmDelete('{{'form_delete_'.$item->id}}')" name="{{'form_delete_'.$item->id}}">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
    @php
    }
    @endphp
    </table>