<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .header-container {
            position: absolute;
            top: 0;
            right: 0;
            margin: 1rem;
        }
        .user-info {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .user-info img {
            width: 40px;
            height: 40px;
            margin-bottom: 0.5rem;
        }
        .nav-tabs {
            margin-top: 3rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-container">
            @auth
                <div class="user-info">
                    <a href="{{route('usuario.show', Auth::user()->id)}}"><img src="https://w7.pngwing.com/pngs/343/677/png-transparent-computer-icons-user-profile-login-my-account-icon-heroes-black-user-thumbnail.png" class="rounded-circle" alt="User Image"></a>
                    <span class="mx-2">{{ Auth::user()->nome }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
    <br>
    <br>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('setor.index') ? 'active' : '' }}" aria-current="page" href="{{ route('setor.index') }}">Setor</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('usuario.index') ? 'active' : '' }}" href="{{ route('usuario.index') }}">Usuario</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('perfil.index') ? 'active' : '' }}" href="{{ route('perfil.index') }}">Perfil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('setor.create') ? 'active' : '' }}" href="{{ route('setor.create') }}">Cadastrar Novo Setor</a>
        </li>
    </ul>
</body>
</html>