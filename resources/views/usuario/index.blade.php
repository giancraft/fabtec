@include('mensagem')

@extends('app')

    <script>
        function confirmDelete(formName) {
            if (confirm('Tem certeza que deseja excluir este item?')) {
                document.forms[formName].submit();
            }
        }   
    </script>

@section('body')

    <br>
    <form action="{{ route('usuario.index') }}" method="GET" class="mb-3">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <input type="text" name="search" class="form-control" placeholder="Pesquisar por nome ou email" value="{{ request('search') }}" style="width: 250px;">
            </div>
            <div class="col-auto">
                <select name="month" class="form-control" style="width: 180px;">
                    <option value="">Selecione o mês</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                            {{ strftime('%B', mktime(0, 0, 0, $month, 1)) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <select name="setor_id" class="form-select">
                    <option value="">Selecione o setor</option>
                    @foreach($setores as $setor)
                        <option value="{{ $setor->id }}" {{ request('setor_id') == $setor->id ? 'selected' : '' }}>
                            {{ $setor->descricao}}
                        </option>
                    @endforeach
                </select>                
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Aplicar</button>
            </div>
    
            <!-- Alinhando o botão "Criar Novo Usuário" à direita -->
            <div class="col-auto ms-auto">
                <a href="{{ route('usuario.create') }}">
                    <button type="button" class="btn btn-success" style="margin-right: 3vw;">Criar Novo Usuário</button>
                </a>
            </div>
        </div>
    </form>    
    <br>

    <table class="table table-hover" border="1px">
        <thead>
        <tr>
            <th scope="col">Id</th>  <th scope="col">Nome</th> <th scope="col">Email</th> <th scope="col">DataNascimento</th> <th scope="col">Detalhes</th> <th scope="col">Alterar</th> <th scope="col">Excluir</th>
        </tr>
        </thead>
        <?php if ($info != null) { ?>
            @foreach ($info as $item)
            
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->dataNascimento}}</td>
                <td>
                    <a href="{{route('usuario.show', $item->id)}}"><button class="btn btn-dark">Detalhes</button></a>
                </td>
                <td>
                    <a href="{{route('usuario.edit', $item->id)}}"><button class="btn btn-dark">Alterar</button></a>
                </td>
                <td>
                    <form name="{{'form_delete_'.$item->id}}" action="{{route('usuario.destroy', $item->id)}}" method="post" name="delete">
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
@endsection