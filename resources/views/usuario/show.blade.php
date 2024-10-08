<h1 class="display-5">Info</h1>

    @extends('app')

    @section('body')

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
@endsection