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
<script>
    function confirmDelete(formName) {
        if (confirm('Tem certeza que deseja excluir este item?')) {
            document.forms[formName].submit();
        }
    }   
</script>
<h1 class="display-5">Editar</h1>

@extends('app')

@section('body')

<br>
<div class="d-flex justify-content-center">
    <form action="{{ route('usuario.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <fieldset>
            @component('usuario.form', ["item"=>$item, "info"=>$info, "funcao"=>$funcao, "usuarioFuncao"=>$usuarioFuncao])
            @endcomponent
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

@endsection