<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .table-container {
            width: 50vw;
            margin: 0 auto; /* Centraliza o contêiner da tabela horizontalmente */
        }
        .form-container {
            margin-bottom: 20px; /* Espaçamento abaixo do formulário */
        }
        .filter-buttons {
            display: flex;
            align-items: center;
            gap: 10px; /* Espaço entre os botões */
        }
    </style>
</head>
<body>
    <script>
        function confirmDelete(formName) {
            if (confirm('Tem certeza que deseja excluir este item?')) {
                document.forms[formName].submit();
            }
        }   
    </script>
    <h1 class="display-5">Editar</h1>

    @include('usuario.menu')
    <br>

    <div class="d-flex justify-content-center">
        <form action="{{ route('usuario.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <fieldset>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ $item->nome}}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $item->email}}" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" class="form-control" value="{{ $item->senha}}" required>
                </div>
                <div class="form-group">
                    <label for="dataNascimento">Data de Nascimento:</label>
                    <input type="date" name="dataNascimento" id="dataNascimento" class="form-control" value="{{ \Carbon\Carbon::parse($item->dataNascimento)->format('Y-m-d') }}" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="setor_id">Setor:</label>
                    <select name="setor_id" id="setor_id">
                        @foreach ($info as $setor)
                        <option value="{{$setor->id}}" {{ $item->setor_id == $setor->id ? 'selected' : '' }}>
                            {{$setor->descricao}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark" name="envia">Alterar</button>
                </div>
            </fieldset>
        </form>
    </div>

    <br><br><br><br><br>

    <div class="table-container">
        <div class="form-container">
            <div class="filter-buttons">
                <!-- Formulário para adicionar -->
                <form action="{{ route('store', $item) }}" method="POST">
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="funcao_id">Função:</label>
                            <select name="funcao_id" id="funcao_id">
                                @foreach ($funcao as $func)
                                <option value="{{ $func->id }}">{{ $func->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-dark" name="envia">Adicionar</button>
                        </div>
                    </div>
                </form>        

                <!-- Formulários para filtro -->
                <form action="{{ route('filterByDate', $item->id) }}" method="GET" class="ms-3">
                    <button type="submit" class="btn btn-primary">Ordenar por Data Mais Antiga</button>
                </form>
                <form action="{{ route('resetOrder', $item->id) }}" method="GET" class="ms-2">
                    <button type="submit" class="btn btn-secondary">Restaurar Ordem</button>
                </form>
            </div>
            
        <br>

        <table class="table table-hover" border="1px" style="width: 100%">
            <thead>
                <tr>
                    <th>Id</th> 
                    <th>Descrição</th> 
                    <th>Excluir</th>
                </tr>
            </thead>
            @foreach ($usuarioFuncao as $fun)
                @if ($fun->usuario_id == $item->id)
                    <tr>
                        <td>{{ $fun->funcao_id }}</td>
                        @foreach ($funcao as $func)
                        @if ($fun->funcao_id == $func->id)
                        <td>{{ $func->descricao }}</td>
                        @endif
                        @endforeach 
                        <td>
                            <form name="{{ 'form_delete_' . $fun->funcao_id }}" action="{{ route('destroy', ['usuario_id' => $fun->usuario_id, 'funcao_id' => $fun->funcao_id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ 'form_delete_' . $fun->funcao_id }}')">Deletar</button>
                            </form>                                                                                               
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
</body>
</html>
