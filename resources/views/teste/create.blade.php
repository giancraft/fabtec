<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

    <h1 class="display-5">Cadastro</h1>

    <ul class="nav nav-tabs" >
        <li class="nav-item">
            <a class="nav-link" href="{{route('aula4.index')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('aula4.create')}}">Cadastrar</a>
        </li>
    </ul>
    <br>
    <br>

    <div class="d-flex justify-content-center">
        <form action="{{ route('aula4.store') }}" method="POST">
            <fieldset>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control" required>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark" name="envia">Enviar</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>