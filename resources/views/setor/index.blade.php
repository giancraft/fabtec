@include('mensagem')

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

    @include('menu')
    <br>

    <form action="{{ route('usuario.index') }}" method="GET" class="mb-3">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <input type="text" name="search" class="form-control" placeholder="Pesquisar descricao do setor" value="{{ request('search') }}" style="width: 250px;">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('setor.create') }}">
                    <button type="button" class="btn btn-success" style="margin-right: 3vw;">Criar Novo Setor</button>
                </a>
            </div>
        </div>
    </form>
    <br>

    <table class="table table-hover" border="1px">
        <thead>
        <tr>
            <th scope="col">Id</th>  <th scope="col">Descricao</th> <th scope="col">Detalhes</th> <th scope="col">Alterar</th> <th scope="col">Excluir</th>
        </tr>
        </thead>
        <?php if ($info != null) { ?>
            @foreach ($info as $item)
            
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->descricao}}</td> 
                <td>
                    <a href="{{route('setor.show', $item->id)}}"><button class="btn btn-dark">Detalhes</button></a>
                </td>
                <td>
                    <a href="{{route('setor.edit', $item->id)}}"><button class="btn btn-dark">Alterar</button></a>
                </td>
                <td>
                    <form name="{{'form_delete_'.$item->id}}" action="{{route('setor.destroy', $item->id)}}" method="post" name="delete">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete('{{'form_delete_'.$item->id}}')">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
    @php
        }
    @endphp
    </table>