<li class="nav-item">
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-link nav-link">Logout</button>
    </form>
</li>

<ul class="nav nav-tabs" >
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{route('setor.index')}}">Setor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('usuario.index')}}">Usuario</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('perfil.index')}}">Perfil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('usuario.create')}}">Cadastrar Novo Usuario</a>
    </li>
</ul>
<br>